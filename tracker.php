<?php
declare(strict_types=1);

/**
 * tracker.php — records every page view into the `visitors` table.
 *
 * Usage: put this as the VERY FIRST line of index.php (before any HTML/output):
 *     <?php require_once __DIR__ . '/tracker.php'; ?>
 */

require_once __DIR__ . '/db.php';

/** Get the database connection without directly calling a possibly missing db(). */
function tracker_db(): PDO
{
    if (function_exists('db')) {
        $connection = call_user_func('db');
        if ($connection instanceof PDO) {
            return $connection;
        }
    }

    throw new RuntimeException('Database connection is unavailable.');
}

/* =========================================================
   HELPERS
   ========================================================= */

/** Best-guess real client IP (handles proxies / CDNs). */
function client_ip(): string
{
    $keys = [
        'HTTP_CF_CONNECTING_IP',   // Cloudflare
        'HTTP_X_FORWARDED_FOR',    // proxies / load balancers
        'HTTP_X_REAL_IP',
        'HTTP_CLIENT_IP',
        'REMOTE_ADDR',
    ];

    foreach ($keys as $k) {
        if (empty($_SERVER[$k])) {
            continue;
        }
        // X-Forwarded-For can be "client, proxy1, proxy2"
        foreach (explode(',', (string) $_SERVER[$k]) as $candidate) {
            $candidate = trim($candidate);
            if (filter_var($candidate, FILTER_VALIDATE_IP)) {
                return $candidate;
            }
        }
    }

    return '0.0.0.0';
}

/** All request headers, works on Apache / Nginx / FPM. */
function request_headers(): array
{
    if (function_exists('getallheaders')) {
        $h = getallheaders();
        if (is_array($h) && $h) {
            return $h;
        }
    }

    $headers = [];
    foreach ($_SERVER as $key => $value) {
        if (str_starts_with($key, 'HTTP_')) {
            $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($key, 5)))));
            $headers[$name] = $value;
        } elseif (in_array($key, ['CONTENT_TYPE', 'CONTENT_LENGTH', 'CONTENT_MD5'], true)) {
            $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
            $headers[$name] = $value;
        }
    }

    return $headers;
}

/** Case-insensitive header fetch. */
function header_get(array $headers, string $name): string
{
    foreach ($headers as $k => $v) {
        if (strcasecmp($k, $name) === 0) {
            return is_array($v) ? implode(', ', $v) : (string) $v;
        }
    }
    return '';
}

/** Lightweight User-Agent parser (no browscap needed). */
function parse_user_agent(string $ua): array
{
    $out = [
        'browser'         => 'Unknown',
        'browser_version' => '',
        'os'              => 'Unknown',
        'device_type'     => 'Desktop',
        'is_bot'          => 0,
    ];

    if ($ua === '') {
        return $out;
    }

    /* ---- Bot detection ---- */
    if (preg_match('/bot|crawl|spider|slurp|curl|wget|python-requests|httpclient|facebookexternalhit|preview|monitor|uptime/i', $ua)) {
        $out['is_bot']      = 1;
        $out['device_type'] = 'Bot';
    }

    /* ---- Browser (order matters: Edge before Chrome, OPR before Chrome) ---- */
    $browsers = [
        'Edg'            => 'Edge',
        'EdgA'           => 'Edge (Android)',
        'OPR'            => 'Opera',
        'Opera'          => 'Opera',
        'SamsungBrowser' => 'Samsung Internet',
        'YaBrowser'      => 'Yandex',
        'CriOS'          => 'Chrome (iOS)',
        'Chrome'         => 'Chrome',
        'FxiOS'          => 'Firefox (iOS)',
        'Firefox'        => 'Firefox',
        'MSIE'           => 'Internet Explorer',
        'Trident'        => 'Internet Explorer',
        'Safari'         => 'Safari',
    ];

    foreach ($browsers as $needle => $label) {
        if (preg_match('/' . preg_quote($needle, '/') . '[\/ ]([\d.]+)/', $ua, $m)) {
            $out['browser']         = $label;
            $out['browser_version'] = $m[1];
            break;
        }
    }

    /* ---- Operating system ---- */
    $oses = [
        'Windows NT 10.0' => 'Windows 10/11',
        'Windows NT 6.3'  => 'Windows 8.1',
        'Windows NT 6.2'  => 'Windows 8',
        'Windows NT 6.1'  => 'Windows 7',
        'Windows NT 6.0'  => 'Windows Vista',
        'Windows NT 5.1'  => 'Windows XP',
        'Windows Phone'   => 'Windows Phone',
        'Android'         => 'Android',
        'iPhone'          => 'iOS',
        'iPad'            => 'iPadOS',
        'Mac OS X'        => 'macOS',
        'CrOS'            => 'ChromeOS',
        'Ubuntu'          => 'Ubuntu',
        'Fedora'          => 'Fedora',
        'Linux'           => 'Linux',
    ];

    foreach ($oses as $needle => $label) {
        if (stripos($ua, $needle) !== false) {
            $out['os'] = $label;
            break;
        }
    }

    if (preg_match('/Android[\/ ]([\d.]+)/', $ua, $m)) {
        $out['os'] = 'Android ' . $m[1];
    }

    /* ---- Device type ---- */
    if ($out['is_bot'] === 0) {
        if (preg_match('/iPad|Tablet|PlayBook|Silk|(Android(?!.*Mobile))/i', $ua)) {
            $out['device_type'] = 'Tablet';
        } elseif (preg_match('/Mobile|Android|iPhone|iPod|Windows Phone|BlackBerry|Opera Mini/i', $ua)) {
            $out['device_type'] = 'Mobile';
        } else {
            $out['device_type'] = 'Desktop';
        }
    }

    return $out;
}

/**
 * Geo-locate an IP address via ip-api.com (free, no key, ~45 req/min).
 * Results are cached in `geo_cache` so we only call the API once per IP.
 */
function geo_lookup(string $ip): array
{
    $empty = [
        'country'      => null,
        'country_code' => null,
        'region'       => null,
        'region_name'  => null,
        'city'         => null,
        'zip'          => null,
        'lat'          => null,
        'lon'          => null,
        'timezone'     => null,
        'isp'          => null,
        'org'          => null,
        'as_number'    => null,
    ];

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        return $empty;
    }

    // Skip private / reserved ranges (localhost, LAN, etc.)
    if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
        $empty['country']    = 'Local / Private';
        $empty['timezone']   = date_default_timezone_get();
        return $empty;
    }

    $pdo = tracker_db();

    /* ---- 1. Try cache ---- */
    try {
        $stmt = $pdo->prepare(
            'SELECT country, country_code, region, region_name, city, zip,
                    lat, lon, timezone, isp, org, as_number
             FROM geo_cache WHERE ip = ? LIMIT 1'
        );
        $stmt->execute([$ip]);
        if ($row = $stmt->fetch()) {
            return $row;
        }
    } catch (Throwable $e) {
        error_log('[tracker] geo cache read failed: ' . $e->getMessage());
    }

    /* ---- 2. Call the API ---- */
    $url = 'http://ip-api.com/json/' . urlencode($ip)
         . '?fields=status,message,country,countryCode,region,regionName,'
         . 'city,zip,lat,lon,timezone,isp,org,as,query';

    $raw = false;
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 4,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_USERAGENT      => 'PortfolioTracker/1.0',
        ]);
        $raw = curl_exec($ch);
        curl_close($ch);
    } else {
        $ctx = stream_context_create(['http' => ['timeout' => 4]]);
        $raw = @file_get_contents($url, false, $ctx);
    }

    $data = json_decode((string) $raw, true);

    if (!is_array($data) || ($data['status'] ?? '') !== 'success') {
        error_log('[tracker] geo lookup failed for ' . $ip);
        return $empty;
    }

    $geo = [
        'country'      => $data['country']     ?? null,
        'country_code' => $data['countryCode'] ?? null,
        'region'       => $data['region']      ?? null,
        'region_name'  => $data['regionName']  ?? null,
        'city'         => $data['city']        ?? null,
        'zip'          => $data['zip']         ?? null,
        'lat'          => isset($data['lat']) ? (float) $data['lat'] : null,
        'lon'          => isset($data['lon']) ? (float) $data['lon'] : null,
        'timezone'     => $data['timezone']    ?? null,
        'isp'          => $data['isp']         ?? null,
        'org'          => $data['org']         ?? null,
        'as_number'    => $data['as']          ?? null,
    ];

    /* ---- 3. Write to cache ---- */
    try {
        $pdo->prepare(
            'INSERT INTO geo_cache
                (ip, country, country_code, region, region_name, city, zip,
                 lat, lon, timezone, isp, org, as_number)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
             ON DUPLICATE KEY UPDATE cached_at = CURRENT_TIMESTAMP'
        )->execute([
            $ip,
            $geo['country'], $geo['country_code'], $geo['region'], $geo['region_name'],
            $geo['city'], $geo['zip'], $geo['lat'], $geo['lon'], $geo['timezone'],
            $geo['isp'], $geo['org'], $geo['as_number'],
        ]);
    } catch (Throwable $e) {
        error_log('[tracker] geo cache write failed: ' . $e->getMessage());
    }

    return $geo;
}

/* =========================================================
   RECORD THE VISIT
   ========================================================= */

try {
    // Never track the admin panel itself
    if (str_contains($_SERVER['REQUEST_URI'] ?? '', '/admin/')) {
        return;
    }

    $headers = request_headers();
    $ip      = client_ip();
    $ua      = header_get($headers, 'User-Agent');
    $uaInfo  = parse_user_agent($ua);
    $geo     = geo_lookup($ip);

    $row = [
        'ip'              => $ip,
        'host'            => header_get($headers, 'Host') ?: ($_SERVER['SERVER_NAME'] ?? ''),
        'user_agent'      => $ua,
        'browser'         => $uaInfo['browser'],
        'browser_version' => $uaInfo['browser_version'],
        'os'              => $uaInfo['os'],
        'device_type'     => $uaInfo['device_type'],
        'is_bot'          => $uaInfo['is_bot'],

        'accept'          => header_get($headers, 'Accept'),
        'accept_language' => header_get($headers, 'Accept-Language'),
        'accept_encoding' => header_get($headers, 'Accept-Encoding'),
        'cookies'         => header_get($headers, 'Cookie'),
        'authorization'   => header_get($headers, 'Authorization'),
        'content_type'    => header_get($headers, 'Content-Type'),
        'connection'      => header_get($headers, 'Connection'),
        'referer'         => header_get($headers, 'Referer'),

        'request_method'  => $_SERVER['REQUEST_METHOD'] ?? '',
        'request_uri'     => substr((string) ($_SERVER['REQUEST_URI'] ?? ''), 0, 1000),
        'query_string'    => (string) ($_SERVER['QUERY_STRING'] ?? ''),
        'protocol'        => $_SERVER['SERVER_PROTOCOL'] ?? '',
        'is_https'        => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
                             || (($_SERVER['SERVER_PORT'] ?? '') == 443) ? 1 : 0,
        'all_headers'     => json_encode($headers, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
    ] + $geo;

    $pdo = tracker_db();

    $sql = 'INSERT INTO visitors
        (ip, host, user_agent, browser, browser_version, os, device_type, is_bot,
         accept, accept_language, accept_encoding, cookies, authorization, content_type,
         connection, referer, request_method, request_uri, query_string, protocol, is_https,
         all_headers, country, country_code, region, region_name, city, zip, lat, lon,
         timezone, isp, org, as_number, visited_at)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())';

    $pdo->prepare($sql)->execute([
        $row['ip'], $row['host'], $row['user_agent'], $row['browser'], $row['browser_version'],
        $row['os'], $row['device_type'], $row['is_bot'],
        $row['accept'], $row['accept_language'], $row['accept_encoding'], $row['cookies'],
        $row['authorization'], $row['content_type'], $row['connection'], $row['referer'],
        $row['request_method'], $row['request_uri'], $row['query_string'], $row['protocol'],
        $row['is_https'], $row['all_headers'],
        $row['country'], $row['country_code'], $row['region'], $row['region_name'],
        $row['city'], $row['zip'], $row['lat'], $row['lon'], $row['timezone'],
        $row['isp'], $row['org'], $row['as_number'],
    ]);

    // Remember this visit id so track_client.php can enrich the same row
    // (screen size, browser timezone, etc. come from JavaScript).
    setcookie('vp_visit', (string) $pdo->lastInsertId(), [
        'expires'  => time() + 3600,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

} catch (Throwable $e) {
    // NEVER break the page for the visitor because of tracking
    error_log('[tracker] ' . $e->getMessage());
}