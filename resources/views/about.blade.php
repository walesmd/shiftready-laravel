<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us — ShiftReady</title>
  <meta name="description" content="Veteran-owned and San Antonio-built. Learn about ShiftReady, our founder Michael Wales, and why we started this company." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <!-- ============================================================
       HEADER
  ============================================================ -->
  <header class="site-header">
    <div class="site-header-inner">

      <a href="/" class="logo-link">
        <div class="logo-mark"><span>SR</span></div>
        <span class="logo-text">ShiftReady</span>
      </a>

      <nav class="main-nav">
        <a href="/#employers">For Employers</a>
        <a href="/#workers">For Workers</a>
        <a href="/#how-it-works">How It Works</a>
        <a href="/about">About</a>
      </nav>

      <div class="header-actions">
        <a href="/login" class="btn btn-ghost btn-sm">Log in</a>
        <a href="/signup/worker" class="btn btn-primary btn-sm">Get Started</a>
      </div>

      <button type="button" id="mobile-menu-btn" class="mobile-menu-btn" aria-label="Toggle menu">
        <span id="mobile-menu-icon">
          <!-- Menu icon -->
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </span>
        <span id="mobile-menu-close-icon" style="display:none;">
          <!-- X icon -->
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </span>
      </button>
    </div>

    <div id="mobile-menu" class="mobile-menu">
      <nav class="mobile-nav">
        <a href="/#employers">For Employers</a>
        <a href="/#workers">For Workers</a>
        <a href="/#how-it-works">How It Works</a>
        <a href="/about">About</a>
      </nav>
      <div class="mobile-nav-actions">
        <a href="/login" class="btn btn-ghost btn-sm btn-w-full">Log in</a>
        <a href="/signup/worker" class="btn btn-primary btn-sm btn-w-full">Get Started</a>
      </div>
    </div>
  </header>

  <!-- ============================================================
       HERO
  ============================================================ -->
  <section class="cta-section">
    <div style="max-width:56rem;margin:0 auto;">
      <p class="section-eyebrow" style="color:rgba(255,255,255,0.7);margin-bottom:1rem;">About ShiftReady</p>
      <h1 style="font-size:clamp(2rem,5vw,3.5rem);font-weight:700;margin-bottom:1.5rem;line-height:1.15;">Veteran-Owned. San Antonio-Built.</h1>
      <p style="font-size:1.125rem;line-height:1.75;max-width:42rem;opacity:0.85;">
        We're not just another staffing company. We're operators who've run staffing businesses, built and sold startups, and served our country. We built ShiftReady because we know this industry can do better.
      </p>
    </div>
  </section>

  <!-- ============================================================
       OUR STORY
  ============================================================ -->
  <section class="section">
    <div class="container">
      <div id="about-story-grid" style="display:grid;grid-template-columns:1fr;gap:3rem;align-items:start;">

        <div>
          <p class="section-eyebrow">Why We Built This</p>
          <h2 class="section-heading">Staffing was broken. We had the receipts.</h2>
          <p class="section-subheading">
            ShiftReady was founded by people who spent years inside staffing operations — not as consultants observing from the outside, but as operators dealing with the same clunky tools, slow processes, and disconnected workers every single day.
          </p>
          <p class="text-muted" style="margin-top:1rem;line-height:1.75;">
            We knew there was a better way. Employers deserve to fill a shift without jumping through hoops. Workers deserve to get paid the same day they work. We stripped away everything that didn't serve those two goals and built something that actually works.
          </p>
        </div>

        <div style="display:grid;grid-template-columns:1fr;gap:1rem;">
          <div class="card">
            <div class="card-content pt-6">
              <div class="icon-box-secondary" style="margin-bottom:1rem;">
                <!-- Shield icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              </div>
              <h3 style="font-weight:600;margin-bottom:0.5rem;">Veterans First</h3>
              <p class="text-sm text-muted" style="line-height:1.625;">Veteran-owned &amp; operated, built with the same discipline that defines military service.</p>
            </div>
          </div>

          <div class="card">
            <div class="card-content pt-6">
              <div class="icon-box-secondary" style="margin-bottom:1rem;">
                <!-- MapPin icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <h3 style="font-weight:600;margin-bottom:0.5rem;">Deep Roots</h3>
              <p class="text-sm text-muted" style="line-height:1.625;">Proudly headquartered in San Antonio, TX — our home, not just our market.</p>
            </div>
          </div>

          <div class="card">
            <div class="card-content pt-6">
              <div class="icon-box-secondary" style="margin-bottom:1rem;">
                <!-- Briefcase icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
              </div>
              <h3 style="font-weight:600;margin-bottom:0.5rem;">Been There</h3>
              <p class="text-sm text-muted" style="line-height:1.625;">We've run staffing companies. We know what employers actually need.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       FOUNDER BIO
  ============================================================ -->
  <section class="section section-bg-card">
    <div class="container">
      <p class="section-eyebrow">The Founder</p>

      <div id="about-founder-grid" style="display:grid;grid-template-columns:1fr;gap:3rem;align-items:start;margin-top:2rem;">

        <div style="display:flex;flex-direction:column;align-items:flex-start;gap:1.5rem;">
          <div style="display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap;">
            <div class="logo-mark" style="width:5rem;height:5rem;font-size:1.25rem;flex-shrink:0;"><span>MW</span></div>
            <div>
              <h2 style="font-size:1.75rem;font-weight:700;margin-bottom:0.5rem;">Michael Wales</h2>
              <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
                <span style="display:inline-flex;align-items:center;gap:0.375rem;padding:0.25rem 0.75rem;background-color:var(--accent-a10);color:var(--accent);border-radius:9999px;font-size:0.8125rem;font-weight:500;">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  US Air Force Veteran
                </span>
                <span style="display:inline-flex;align-items:center;gap:0.375rem;padding:0.25rem 0.75rem;background-color:var(--secondary);color:var(--foreground);border-radius:9999px;font-size:0.8125rem;font-weight:500;">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                  San Antonio, TX
                </span>
                <span style="display:inline-flex;align-items:center;gap:0.375rem;padding:0.25rem 0.75rem;background-color:var(--secondary);color:var(--foreground);border-radius:9999px;font-size:0.8125rem;font-weight:500;">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 2 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                  Startup Founder
                </span>
              </div>
            </div>
          </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:1rem;">
          <p class="text-muted" style="line-height:1.75;">
            Michael served in the US Air Force and went on to build a career spanning government technology, education tech, and engineering leadership. He's not just a startup founder — he's someone who's done the hard work across multiple industries and brought those lessons with him.
          </p>
          <p class="text-muted" style="line-height:1.75;">
            Before ShiftReady, Michael successfully built and exited startups — meaning he knows what it takes to get from zero to something real. That scrappy, mission-focused mentality is baked into everything ShiftReady does.
          </p>
          <p class="text-muted" style="line-height:1.75;">
            He also ran staffing operations firsthand. He watched how clunky, impersonal, and slow the industry was for everyone involved — employers waiting days for workers, workers waiting weeks to get paid. That experience wasn't just frustrating; it was clarifying.
          </p>
          <p class="text-muted" style="line-height:1.75;">
            ShiftReady is the company Michael wishes had existed when he needed it — combining real operational experience with modern technology to make on-demand staffing actually work.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       VALUES
  ============================================================ -->
  <section class="section">
    <div class="container">
      <div style="max-width:42rem;margin-bottom:3rem;">
        <p class="section-eyebrow">What We Stand For</p>
        <h2 class="section-heading">Our Values</h2>
      </div>

      <div id="about-values-grid" style="display:grid;grid-template-columns:1fr;gap:1.5rem;">

        <div class="card">
          <div class="card-content pt-6">
            <div class="icon-box-secondary" style="margin-bottom:1rem;">
              <!-- CheckCircle icon -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
            <h3 style="font-weight:600;margin-bottom:0.5rem;">Built on Integrity</h3>
            <p class="text-sm text-muted" style="line-height:1.625;">No games, no bait-and-switch. Workers get paid what they're promised. Employers get what they requested. Every time.</p>
          </div>
        </div>

        <div class="card">
          <div class="card-content pt-6">
            <div class="icon-box-secondary" style="margin-bottom:1rem;">
              <!-- Heart icon -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
            </div>
            <h3 style="font-weight:600;margin-bottom:0.5rem;">People Over Process</h3>
            <p class="text-sm text-muted" style="line-height:1.625;">Staffing shouldn't require a law degree. We've stripped away the bureaucracy to make it human again — simple for workers, simple for employers.</p>
          </div>
        </div>

        <div class="card">
          <div class="card-content pt-6">
            <div class="icon-box-secondary" style="margin-bottom:1rem;">
              <!-- Home icon -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>
            <h3 style="font-weight:600;margin-bottom:0.5rem;">Community-Driven</h3>
            <p class="text-sm text-muted" style="line-height:1.625;">San Antonio is our home. We reinvest in the local workforce and expand only where we can serve well — not just where it looks good on a map.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       CTA
  ============================================================ -->
  <section class="cta-section">
    <div style="max-width:56rem;margin:0 auto;">
      <h2>Ready to work with us?</h2>
      <p>Whether you need workers for tomorrow or you're looking for flexible work on your terms, getting started takes less than 5 minutes.</p>
      <div class="cta-actions">
        <a href="/signup/employer" class="btn btn-inverted btn-lg">
          I Need Workers
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
        <a href="/signup/worker" class="btn btn-outline-inverted btn-lg">I Want to Work</a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       FOOTER
  ============================================================ -->
  <footer class="site-footer">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="logo-link">
          <div class="logo-mark"><span>SR</span></div>
          <span class="logo-text">ShiftReady</span>
        </a>
        <p>On-demand staffing made simple. Serving San Antonio and expanding across Texas.</p>
      </div>

      <div class="footer-col">
        <h4>For Employers</h4>
        <ul>
          <li><a href="#">Request Workers</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="/#how-it-works">How It Works</a></li>
          <li><a href="#">Contact Sales</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>For Workers</h4>
        <ul>
          <li><a href="/signup/worker">Sign Up</a></li>
          <li><a href="#">Find Jobs</a></li>
          <li><a href="#">How Payments Work</a></li>
          <li><a href="#">Worker FAQ</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="/about">About Us</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2026 ShiftReady. All rights reserved.</p>
      <p>Made with care in San Antonio, TX</p>
    </div>
  </footer>

  <!-- Responsive layout for story and founder sections -->
  <style>
    @media (min-width: 1024px) {
      #about-story-grid { grid-template-columns: 1fr 1fr; }
      #about-founder-grid { grid-template-columns: auto 1fr; }
      #about-values-grid { grid-template-columns: 1fr 1fr 1fr; }
    }
  </style>

</body>
</html>
