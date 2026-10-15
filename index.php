 <?php require_once  './tracker.php'; ?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Vraj Patel — Python Full Stack Developer</title>
<meta name="description" content="Portfolio of Vraj Patel, a Python Full Stack Developer from Kadi, Gujarat. Skilled in Python, Django, Flask, FastAPI, Java and MySQL." />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<header id="header">
  <div class="container nav">
    <a href="#home" class="brand">
      <span class="mark">VP</span>
      <span>Vraj Patel</span>
    </a>

    <nav class="nav-links" id="navLinks">
      <a href="#about">About</a>
      <a href="#skills">Skills</a>
      <a href="#experience">Experience</a>
      <a href="#projects">Projects</a>
      <a href="#education">Education</a>
      <a href="#contact">Contact</a>
    </nav>

    <div class="nav-actions">
      <button class="icon-btn" id="themeBtn" aria-label="Toggle theme">
        <svg id="themeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>
        </svg>
      </button>
      <button class="icon-btn burger" id="burger" aria-label="Menu">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <path d="M3 6h18M3 12h18M3 18h18"/>
        </svg>
      </button>
    </div>
  </div>
</header>

  <div class="hero-image" >
    <!-- Using the provided image -->
    <img src="./parfet.JPG" alt="Vraj Patel">
  </div>


<!-- ================= HERO ================= -->
<section class="hero" id="home">
  <div class="container hero-inner">
    <div class="hero-text reveal">
      <span class="eyebrow"><span class="dot"></span> Open to new opportunities</span>
      <h1>Hi, I'm <span class="grad">Vraj Patel</span></h1>
      <p class="role">Python Full Stack Developer</p>
      <p class="lead">
        Motivated and detail-oriented developer who builds scalable web applications end to end —
        from clean REST APIs and database design to responsive, user-friendly interfaces.
        Passionate about writing maintainable code and continuously learning new technologies.
      </p>

      <div class="cta">
        <a href="#projects" class="btn btn-primary">
          View My Work
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="#contact" class="btn btn-ghost">Hire Me</a>
      </div>

      <div class="hero-meta">
        <span>
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          Kadi, Gujarat, India
        </span>
        <span>
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="M2 7l10 6 10-6"/></svg>
          patelvraj2708@gmail.com
        </span>
      </div>
    </div>

    <div class="hero-visual reveal">
      <div class="code-card">
        <div class="code-top">
          <i></i><i></i><i></i>
          <span>developer.py</span>
        </div>
<pre><code><span class="k">class</span> <span class="f">Developer</span>:
    <span class="k">def</span> <span class="f">__init__</span>(self):
        self.name    = <span class="s">"Vraj Patel"</span>
        self.role    = <span class="s">"Full Stack Dev"</span>
        self.stack   = [<span class="s">"Python"</span>, <span class="s">"Django"</span>,
                        <span class="s">"Flask"</span>, <span class="s">"FastAPI"</span>]
        self.db      = [<span class="s">"MySQL"</span>, <span class="s">"PostgreSQL"</span>]

    <span class="k">def</span> <span class="f">build</span>(self, idea):
        <span class="c"># ship clean, scalable code</span>
        <span class="k">return</span> <span class="f">deploy</span>(idea, tested=<span class="n">True</span>)
</code></pre>
      </div>
    </div>
  </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about">
  <div class="container">
    <div class="sec-head reveal">
      <p class="sec-tag">01 — About Me</p>
      <h2>Building reliable software, one clean commit at a time.</h2>
    </div>

    <div class="about-grid">
      <div class="reveal">
        <p>
          I'm a <strong>Python Full Stack Developer</strong> based in Kadi, Gujarat, with a strong academic
          foundation in Information Technology (MCA &amp; BCA) and hands-on experience gained through
          an intensive full stack internship at <strong>QSpiders, Ahmedabad</strong>.
        </p>
        <p>
          My work spans backend development with <strong>Python, Django, Flask and FastAPI</strong>,
          relational database design with <strong>MySQL and PostgreSQL</strong>, and front-end
          implementation using <strong>HTML, CSS and JavaScript</strong>. I also bring solid
          <strong>Java (Servlets, JSP, JDBC)</strong> experience from academic projects, giving me a
          broader understanding of enterprise web architecture.
        </p>
        <p>
          I care about the details that make software dependable: secure authentication, optimized
          queries, clear code structure and thorough debugging. I work well in teams, follow agile
          practices, and I'm always learning something new.
        </p>
      </div>

      <div class="stat-grid reveal">
        <div class="stat">
          <div class="ico">🎓</div>
          <div><b>MCA</b><small>Information Technology</small></div>
        </div>
        <div class="stat">
          <div class="ico">💼</div>
          <div><b>6+ Months</b><small>Full Stack Internship</small></div>
        </div>
        <div class="stat">
          <div class="ico">🚀</div>
          <div><b>3 Projects</b><small>Full stack &amp; deep learning</small></div>
        </div>
        <div class="stat">
          <div class="ico">⚡</div>
          <div><b>9+ Languages</b><small>&amp; frameworks in toolkit</small></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SKILLS ================= -->
<section id="skills">
  <div class="container">
    <div class="sec-head reveal">
      <p class="sec-tag">02 — Technical Skills</p>
      <h2>The tools I use to turn ideas into working products.</h2>
    </div>

    <div class="skills-grid">
      <div class="card skill-card reveal">
        <h3><span class="bar"></span> Languages</h3>
        <div class="pills">
          <span class="pill">Python</span>
          <span class="pill">Java</span>
          <span class="pill">JavaScript</span>
          <span class="pill">HTML</span>
          <span class="pill">CSS</span>
          <span class="pill">SQL</span>
          <span class="pill">C</span>
          <span class="pill">C++</span>
          <span class="pill">PHP</span>
        </div>
      </div>

      <div class="card skill-card reveal">
        <h3><span class="bar"></span> Frameworks</h3>
        <div class="pills">
          <span class="pill">Django</span>
          <span class="pill">FastAPI</span>
          <span class="pill">Flask</span>
          <span class="pill">Java Servlets</span>
          <span class="pill">JSP</span>
          <span class="pill">PHP Web Dev</span>
        </div>
      </div>

      <div class="card skill-card reveal">
        <h3><span class="bar"></span> Databases</h3>
        <div class="pills">
          <span class="pill">MySQL</span>
          <span class="pill">PostgreSQL</span>
          <span class="pill">JDBC</span>
          <span class="pill">JSON Storage</span>
        </div>
      </div>

      <div class="card skill-card reveal">
        <h3><span class="bar"></span> Tools &amp; Platforms</h3>
        <div class="pills">
          <span class="pill">GitHub</span>
          <span class="pill">VS Code</span>
          <span class="pill">Eclipse</span>
          <span class="pill">XAMPP</span>
          <span class="pill">Linux</span>
          <span class="pill">OpenCV</span>
          <span class="pill">TensorFlow</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= EXPERIENCE ================= -->
<section id="experience">
  <div class="container">
    <div class="sec-head reveal">
      <p class="sec-tag">03 — Experience</p>
      <h2>Where I've put my skills to work.</h2>
    </div>

    <div class="timeline">
      <div class="tl-item reveal">
        <div class="card">
          <div class="tl-head">
            <h3>Python Full Stack Internship</h3>
            <span class="when">Dec 2024 — Jun 2025</span>
          </div>
          <p class="tl-sub">QSpiders — Ahmedabad Branch</p>
          <ul class="bullets">
            <li>Trained intensively across the Python full stack — core Python, front-end fundamentals, and backend frameworks including Django, Flask and FastAPI.</li>
            <li>Gained practical exposure to real-world project workflows, structured debugging practices and agile methodologies.</li>
            <li>Built and maintained database-driven modules using MySQL, writing optimized queries and handling data validation.</li>
            <li>Collaborated on code reviews and version control workflows using Git and GitHub.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PROJECTS ================= -->
<section id="projects">
  <div class="container">
    <div class="sec-head reveal">
      <p class="sec-tag">04 — Projects</p>
      <h2>Selected work I've designed and built.</h2>
      <p>A mix of deep learning, Java enterprise web apps and database-driven systems.</p>
    </div>

    <div class="proj-grid">

      <!-- Project 1 -->
      <article class="proj reveal">
        <div class="proj-top">
          <div class="proj-ico">
            <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="3"/>
              <circle cx="8.5" cy="8.5" r="1.5"/>
              <path d="M21 15l-5-5L5 21"/>
            </svg>
          </div>
          <span class="badge">Live Project</span>
        </div>
        <h3>Image Classification System</h3>
        <ul class="bullets">
          <li>Developed a deep learning–based image classification system using Python, integrating Flask for backend routing and OpenCV / TensorFlow for image preprocessing and model inference.</li>
          <li>Implemented secure file-upload handling to process user-submitted images, storing classification metadata and results in a JSON database.</li>
          <li>Optimized the model inference pipeline and server response times to support high-throughput concurrent requests.</li>
        </ul>
        <div class="tech">
          <span>Python</span><span>Flask</span><span>TensorFlow</span><span>OpenCV</span><span>JSON</span>
        </div>
      </article>

      <!-- Project 2 -->
      <article class="proj reveal">
        <div class="proj-top">
          <div class="proj-ico">
            <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
              <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
            </svg>
          </div>
          <span class="badge">College Project</span>
        </div>
        <h3>Library Management System</h3>
        <ul class="bullets">
          <li>Developed a full-stack Java web application using Servlets, JSP and JDBC to manage library operations, student accounts and book circulation.</li>
          <li>Implemented secure role-based authentication (Admin &amp; Student) using session management and database-backed validation with MySQL.</li>
          <li>Built core modules for book catalog management, student book requests and automated fine calculation for overdue returns using SQL functions.</li>
        </ul>
        <div class="tech">
          <span>Java</span><span>Servlets</span><span>JSP</span><span>JDBC</span><span>MySQL</span>
        </div>
      </article>

      <!-- Project 3 -->
      <article class="proj reveal">
        <div class="proj-top">
          <div class="proj-ico">
            <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 21h18"/>
              <path d="M5 21V7l7-4 7 4v14"/>
              <path d="M9 21v-5h6v5"/>
              <path d="M9 10h.01M15 10h.01"/>
            </svg>
          </div>
          <span class="badge">College Project</span>
        </div>
        <h3>Hotel Management System</h3>
        <ul class="bullets">
          <li>Developed a dynamic Java web application using Servlets, JSP and JDBC featuring dual workflows for customers and administrators.</li>
          <li>Integrated database-backed room search, automated stay-length and pricing calculation, booking management and PDF invoice generation via iText.</li>
          <li>Implemented a secure DAO-based architecture with MySQL connectivity for managing customer accounts, room availability states and administrative oversight.</li>
        </ul>
        <div class="tech">
          <span>Java</span><span>JSP</span><span>JDBC</span><span>MySQL</span><span>iText</span>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ================= EDUCATION ================= -->
<section id="education">
  <div class="container">
    <div class="sec-head reveal">
      <p class="sec-tag">05 — Education</p>
      <h2>Academic background.</h2>
    </div>

    <div class="timeline">
      <div class="tl-item reveal">
        <div class="card">
          <div class="tl-head">
            <h3>Master of Computer Applications (MCA)</h3>
            <span class="when">Information Technology</span>
          </div>
          <p class="tl-sub">S.K. Patel Institute of Management — Kadi, Mahesana</p>
          <ul class="bullets">
            <li>CGPI: <strong>7.58</strong> &nbsp;•&nbsp; Semester 2 SPI: <strong>7.98</strong></li>
          </ul>
        </div>
      </div>

      <div class="tl-item reveal">
        <div class="card">
          <div class="tl-head">
            <h3>Bachelor of Computer Applications (BCA)</h3>
            <span class="when">Information Technology</span>
          </div>
          <p class="tl-sub">NPC College of Management — Kadi, Mahesana</p>
          <ul class="bullets">
            <li>CGPI: <strong>7.72</strong> &nbsp;•&nbsp; Percentage: <strong>72.10%</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact">
  <div class="container">
    <div class="contact-wrap reveal">
      <div class="contact-info">
        <p class="sec-tag">06 — Contact</p>
        <h2>Let's build something great together.</h2>
        <p>
          I'm currently open to full-time roles and freelance projects in Python full stack
          and backend development. Drop me a message — I usually reply within 24 hours.
        </p>

        <div class="contact-list">
          <a href="mailto:patelvraj2708@gmail.com?subject=Hello%20Vraj">
            <span class="ci">
              <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="M2 7l10 6 10-6"/></svg>
            </span>
            <span><small>Email</small><b>patelvraj2708@gmail.com</b></span>
          </a>

          <a href="tel:+917383102708">
            <span class="ci">
              <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .4 2 .7 2.9a2 2 0 01-.5 2.1L8.1 9.9a16 16 0 006 6l1.2-1.2a2 2 0 012.1-.5c.9.3 1.9.6 2.9.7a2 2 0 011.7 2z"/></svg>
            </span>
            <span><small>Phone</small><b>(+91) 73831 02708</b></span>
          </a>

          <a href="https://www.linkedin.com/in/vraj-patel-py/" target="_blank" rel="noopener">
            <span class="ci">
              <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-4 0v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            </span>
            <span><small>LinkedIn</small><b>Connect with me</b></span>
          </a>

          <a href="https://github.com/heckykali" target="_blank" rel="noopener">
            <span class="ci">
              <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.9a3.4 3.4 0 00-1-2.6c3.1-.3 6.4-1.5 6.4-7A5.4 5.4 0 0019.9 4a5 5 0 00-.1-3.7s-1.2-.4-4 1.5a13.4 13.4 0 00-7 0C6 .9 4.8 1.3 4.8 1.3A5 5 0 004.7 5a5.4 5.4 0 00-1.5 3.8c0 5.4 3.3 6.6 6.4 7A3.4 3.4 0 009 18.4V22"/></svg>
            </span>
            <span><small>GitHub</small><b>View my repositories</b></span>
          </a>
        </div>
      </div>

      <form id="contactForm" novalidate>
        <div class="field">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="e.g. Rahul Sharma" required />
        </div>
        <div class="field">
          <label for="email">Your Email</label>
          <input type="email" id="email" name="email" placeholder="you@company.com" required />
        </div>
        <div class="field">
          <label for="message">Project Details</label>
          <textarea id="message" name="message" placeholder="Tell me about your project, timeline and goals..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
          Send Message
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
        </button>
      </form>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<div class="container">
  <footer>
    <p>© <span id="year"></span> Vraj Patel. Built with care in Kadi, Gujarat.</p>
    <div class="socials">
      <a href="mailto:patelvraj2708@gmail.com" aria-label="Email">
        <svg viewBox="0 0 24 24"><path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4.4l-8 5-8-5V6l8 5 8-5v2.4z"/></svg>
      </a>
      <a href="https://www.linkedin.com/in/vraj-patel-py/" target="_blank" rel="noopener" aria-label="LinkedIn">
        <svg viewBox="0 0 24 24"><path d="M4.98 3.5A2.5 2.5 0 112.5 6 2.5 2.5 0 014.98 3.5zM3 8.98h4V21H3zM9 8.98h3.8v1.64h.05a4.17 4.17 0 013.75-2.06c4 0 4.75 2.64 4.75 6.07V21h-4v-5.5c0-1.31-.02-3-1.83-3s-2.1 1.43-2.1 2.9V21H9z"/></svg>
      </a>
      <a href="https://github.com/heckykali" target="_blank" rel="noopener" aria-label="GitHub">
        <svg viewBox="0 0 24 24"><path d="M12 .5A11.5 11.5 0 00.5 12a11.5 11.5 0 007.86 10.92c.58.1.79-.25.79-.56v-2c-3.2.7-3.88-1.37-3.88-1.37-.53-1.34-1.3-1.7-1.3-1.7-1.06-.72.08-.71.08-.71 1.17.08 1.79 1.2 1.79 1.2 1.04 1.79 2.73 1.27 3.4.97.1-.75.4-1.27.73-1.56-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11 11 0 015.8 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.12 3.05.74.81 1.18 1.84 1.18 3.1 0 4.43-2.68 5.4-5.24 5.69.41.36.78 1.06.78 2.14v3.17c0 .31.2.67.8.56A11.5 11.5 0 0023.5 12 11.5 11.5 0 0012 .5z"/></svg>
      </a>
    </div>
  </footer>
</div>

<button class="to-top" id="toTop" aria-label="Back to top">
  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<script>
(function () {
  "use strict";

  /* ---------- Year ---------- */
  document.getElementById("year").textContent = new Date().getFullYear();

  /* ---------- Theme toggle ---------- */
  const root = document.documentElement;
  const themeBtn = document.getElementById("themeBtn");
  const themeIcon = document.getElementById("themeIcon");

  const moonIcon = '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>';
  const sunIcon  = '<path d="M21 12.8A9 9 0 1111.2 3a7 7 0 009.8 9.8z"/>';

  const saved = localStorage.getItem("vp-theme");
  if (saved) {
    root.setAttribute("data-theme", saved);
    themeIcon.innerHTML = saved === "light" ? sunIcon : moonIcon;
  }

  themeBtn.addEventListener("click", () => {
    const next = root.getAttribute("data-theme") === "dark" ? "light" : "dark";
    root.setAttribute("data-theme", next);
    localStorage.setItem("vp-theme", next);
    themeIcon.innerHTML = next === "light" ? sunIcon : moonIcon;
  });

  /* ---------- Mobile menu ---------- */
  const burger = document.getElementById("burger");
  const navLinks = document.getElementById("navLinks");

  burger.addEventListener("click", () => navLinks.classList.toggle("open"));
  navLinks.querySelectorAll("a").forEach(a =>
    a.addEventListener("click", () => navLinks.classList.remove("open"))
  );

  /* ---------- Header shadow + back-to-top ---------- */
  const header = document.getElementById("header");
  const toTop = document.getElementById("toTop");

  const onScroll = () => {
    const y = window.scrollY;
    header.classList.toggle("scrolled", y > 12);
    toTop.classList.toggle("show", y > 600);
  };
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  toTop.addEventListener("click", () =>
    window.scrollTo({ top: 0, behavior: "smooth" })
  );

  /* ---------- Scroll reveal ---------- */
  const revealEls = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver(
      entries => {
        entries.forEach((entry, i) => {
          if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add("in"), i * 70);
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -60px 0px" }
    );
    revealEls.forEach(el => io.observe(el));
  } else {
    revealEls.forEach(el => el.classList.add("in"));
  }

  /* ---------- Active nav link ---------- */
  const sections = [...document.querySelectorAll("section[id]")];
  const linkFor = id =>
    document.querySelector('.nav-links a[href="#' + id + '"]');

  if ("IntersectionObserver" in window) {
    const spy = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            document.querySelectorAll(".nav-links a").forEach(a =>
              a.classList.remove("active")
            );
            const link = linkFor(entry.target.id);
            if (link) link.classList.add("active");
          }
        });
      },
      { rootMargin: "-45% 0px -50% 0px" }
    );
    sections.forEach(s => spy.observe(s));
  }

  /* ---------- Contact form → mailto ---------- */
  const form = document.getElementById("contactForm");
  form.addEventListener("submit", e => {
    e.preventDefault();

    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const message = form.message.value.trim();

    if (!name || !email || !message) {
      alert("Please fill in all fields before sending.");
      return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    const subject = "Portfolio enquiry from " + name;
    const body =
      message + "\n\n—\n" + name + "\n" + email;

    window.location.href =
      "mailto:patelvraj2708@gmail.com" +
      "?subject=" + encodeURIComponent(subject) +
      "&body=" + encodeURIComponent(body);
  });
})();
</script>
</body>
</html>

