<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ShiftReady  -  Staffing made as simple as a text message</title>
  <meta name="description" content="Connect employers with ready-to-work talent instantly. Workers get flexible opportunities. Employers get reliable help." />
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

      <a href="{{ route('home') }}" class="logo-link">
        <div class="logo-mark"><span>SR</span></div>
        <span class="logo-text">ShiftReady</span>
      </a>

      <nav class="main-nav">
        <a href="#employers">For Employers</a>
        <a href="#workers">For Workers</a>
        <a href="#how-it-works">How It Works</a>
        <a href="{{ route('about') }}">About</a>
      </nav>

      <div class="header-actions">
        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Log in</a>
        <a href="{{ route('signup.worker') }}" class="btn btn-primary btn-sm">Get Started</a>
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
        <a href="#employers">For Employers</a>
        <a href="#workers">For Workers</a>
        <a href="#how-it-works">How It Works</a>
        <a href="{{ route('about') }}">About</a>
      </nav>
      <div class="mobile-nav-actions">
        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm btn-w-full">Log in</a>
        <a href="{{ route('signup.worker') }}" class="btn btn-primary btn-sm btn-w-full">Get Started</a>
      </div>
    </div>
  </header>

  <!-- ============================================================
       HERO
  ============================================================ -->
  <section class="hero-section">
    <div class="hero-inner">
      <div class="hero-content">
        <div class="hero-pill">
          <span class="hero-pill-dot"></span>
          Now serving San Antonio, TX
        </div>

        <h1 class="hero-title">Staffing made as simple as a text message</h1>

        <p class="hero-desc">
          Connect employers with ready-to-work talent instantly. Workers get flexible opportunities. Employers get reliable help. Everyone wins.
        </p>

        <div class="hero-actions">
          <a href="{{ route('signup.employer') }}" class="btn btn-primary btn-lg">
            I Need Workers
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </a>
          <a href="{{ route('signup.worker') }}" class="btn btn-outline btn-lg">I Want to Work</a>
        </div>
      </div>

      <div class="hero-phone">
        <!-- Phone Mockup -->
        <div class="phone-outer">
          <div class="phone-shell">
            <div class="phone-screen">
              <div class="phone-header">
                <div class="phone-avatar"><span>SR</span></div>
                <div class="phone-header-text">
                  <p>ShiftReady</p>
                  <p>Text Message</p>
                </div>
              </div>

              <div class="phone-body">
                <div class="chat-msg chat-msg-incoming">
                  <div class="chat-bubble chat-bubble-incoming">
                    <p>Hi Maria! Warehouse help needed tomorrow 8am-2pm at Downtown Logistics. $18/hr. Interested?</p>
                    <p class="chat-time">9:15 AM</p>
                  </div>
                </div>
                <div class="chat-msg chat-msg-outgoing">
                  <div class="chat-bubble chat-bubble-outgoing">
                    <p>Yes</p>
                    <p class="chat-time">9:16 AM</p>
                  </div>
                </div>
                <div class="chat-msg chat-msg-incoming">
                  <div class="chat-bubble chat-bubble-incoming">
                    <p>You're confirmed! Address: 123 Commerce St. Ask for Mike at the loading dock. Payment hits your account when shift ends.</p>
                    <p class="chat-time">9:16 AM</p>
                  </div>
                </div>
                <div class="chat-msg chat-msg-outgoing">
                  <div class="chat-bubble chat-bubble-outgoing">
                    <p>Thanks!</p>
                    <p class="chat-time">9:17 AM</p>
                  </div>
                </div>
              </div>

              <div class="phone-footer">
                <div class="phone-input-fake">iMessage</div>
                <div class="phone-send-btn">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
              </div>
            </div>
          </div>
          <div class="phone-shadow"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       STATS
  ============================================================ -->
  <section class="section section-bg-card section-border-y" style="padding-top:4rem;padding-bottom:4rem;">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <p class="stat-value">&lt; 30 sec</p>
          <p class="stat-label">Average response time</p>
        </div>
        <div class="stat-item">
          <p class="stat-value">Same day</p>
          <p class="stat-label">Payment processing</p>
        </div>
        <div class="stat-item">
          <p class="stat-value">95%</p>
          <p class="stat-label">Worker satisfaction</p>
        </div>
        <div class="stat-item">
          <p class="stat-value">Zero</p>
          <p class="stat-label">Payroll headaches</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       EMPLOYERS SECTION
  ============================================================ -->
  <section id="employers" class="section">
    <div class="container">
      <div style="max-width:42rem;margin-bottom:3rem;">
        <p class="section-eyebrow">For Employers</p>
        <h2 class="section-heading">Stop worrying about staffing. Start getting work done.</h2>
        <p class="section-subheading">
          If a job can be trained in 10-15 minutes and you don't need the same person every day, we're your solution.
        </p>
      </div>

      <div class="benefits-grid-4" style="margin-bottom:3rem;">
        <!-- Card: No Payroll Hassles -->
        <div class="card">
          <div class="card-content pt-6">
            <div class="icon-box-secondary" style="margin-bottom:1rem;">
              <!-- Calculator icon -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/></svg>
            </div>
            <h3 style="font-weight:600;margin-bottom:0.5rem;">No Payroll Hassles</h3>
            <p class="text-sm text-muted" style="line-height:1.625;">We handle all payroll, taxes, and compliance. Workers are on our books, not yours.</p>
          </div>
        </div>

        <!-- Card: No Recruiting Needed -->
        <div class="card">
          <div class="card-content pt-6">
            <div class="icon-box-secondary" style="margin-bottom:1rem;">
              <!-- Users icon -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3 style="font-weight:600;margin-bottom:0.5rem;">No Recruiting Needed</h3>
            <p class="text-sm text-muted" style="line-height:1.625;">Tell us what you need, we fill the shift. It's that simple.</p>
          </div>
        </div>

        <!-- Card: No HR Paperwork -->
        <div class="card">
          <div class="card-content pt-6">
            <div class="icon-box-secondary" style="margin-bottom:1rem;">
              <!-- FileText icon -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
            </div>
            <h3 style="font-weight:600;margin-bottom:0.5rem;">No HR Paperwork</h3>
            <p class="text-sm text-muted" style="line-height:1.625;">Skip the onboarding paperwork. We manage W-2s, I-9s, and insurance.</p>
          </div>
        </div>

        <!-- Card: Flexible Scheduling -->
        <div class="card">
          <div class="card-content pt-6">
            <div class="icon-box-secondary" style="margin-bottom:1rem;">
              <!-- Clock icon -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <h3 style="font-weight:600;margin-bottom:0.5rem;">Flexible Scheduling</h3>
            <p class="text-sm text-muted" style="line-height:1.625;">Need help tomorrow? Next week? Scale up or down as your business demands.</p>
          </div>
        </div>
      </div>

      <!-- Perfect for roles panel -->
      <div class="secondary-panel">
        <div class="secondary-panel-inner">
          <div style="flex:1;">
            <h3 style="font-size:1.25rem;font-weight:600;margin-bottom:1rem;">Perfect for roles like:</h3>
            <div class="check-list">
              <div class="check-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                Warehouse packing &amp; sorting
              </div>
              <div class="check-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                Moving &amp; loading help
              </div>
              <div class="check-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                Event setup &amp; teardown
              </div>
              <div class="check-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                Vehicle relocation
              </div>
              <div class="check-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                Light assembly work
              </div>
              <div class="check-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                General labor support
              </div>
            </div>
          </div>
          <div class="secondary-panel-cta">
            <a href="{{ route('signup.employer') }}" class="btn btn-primary btn-lg">
              Request Workers
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
            <p class="text-sm text-muted" style="margin-top:0.75rem;">No contracts. Pay only for hours worked.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WORKERS SECTION
  ============================================================ -->
  <section id="workers" class="section section-bg-card">
    <div class="container">
      <div style="max-width:42rem;margin-bottom:3rem;">
        <p class="section-eyebrow">For Workers</p>
        <h2 class="section-heading">Earn extra money on your terms.</h2>
        <p class="section-subheading">
          Looking to supplement your income? Want flexible work around your schedule? We text you opportunities - you decide if they're right for you.
        </p>
      </div>

      <div class="benefits-grid-2" style="margin-bottom:3rem;">
        <!-- Benefit: Simple as Yes or No -->
        <div class="card" style="background-color:var(--background);">
          <div class="card-content pt-6">
            <div style="display:flex;gap:1rem;">
              <div class="icon-box-accent">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
              </div>
              <div>
                <h3 style="font-weight:600;margin-bottom:0.5rem;">Simple as Yes or No</h3>
                <p class="text-sm text-muted" style="line-height:1.625;">Get job offers via text. Reply Yes to accept, No to skip. No apps to download, no complicated systems.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Benefit: Get Paid Immediately -->
        <div class="card" style="background-color:var(--background);">
          <div class="card-content pt-6">
            <div style="display:flex;gap:1rem;">
              <div class="icon-box-accent">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
              </div>
              <div>
                <h3 style="font-weight:600;margin-bottom:0.5rem;">Get Paid Immediately</h3>
                <p class="text-sm text-muted" style="line-height:1.625;">Finish your shift, get paid. Money hits your account the same day. No waiting for payday.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Benefit: Work When You Want -->
        <div class="card" style="background-color:var(--background);">
          <div class="card-content pt-6">
            <div style="display:flex;gap:1rem;">
              <div class="icon-box-accent">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              </div>
              <div>
                <h3 style="font-weight:600;margin-bottom:0.5rem;">Work When You Want</h3>
                <p class="text-sm text-muted" style="line-height:1.625;">Only take jobs that fit your schedule. No commitments, no penalties for saying no.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Benefit: Jobs Near You -->
        <div class="card" style="background-color:var(--background);">
          <div class="card-content pt-6">
            <div style="display:flex;gap:1rem;">
              <div class="icon-box-accent">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <div>
                <h3 style="font-weight:600;margin-bottom:0.5rem;">Jobs Near You</h3>
                <p class="text-sm text-muted" style="line-height:1.625;">We match you with opportunities in your area. Less commute, more time for what matters.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Dark CTA panel -->
      <div class="dark-panel">
        <h3>Ready to start earning?</h3>
        <p>Sign up in 2 minutes. No fees, no catches. We'll text you when we have work that matches your profile.</p>
        <a href="{{ route('signup.worker') }}" class="btn btn-inverted btn-lg">Join ShiftReady</a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       HOW IT WORKS
  ============================================================ -->
  <section id="how-it-works" class="section">
    <div class="container">
      <div style="text-align:center;margin-bottom:4rem;">
        <h2>How It Works</h2>
        <p class="section-subheading" style="margin-top:1rem;">Simple for everyone involved.</p>
      </div>

      <div class="how-it-works-grid">
        <!-- For Employers -->
        <div>
          <div class="step-column-header">
            <span class="step-col-badge step-col-badge-e">E</span>
            <h3 style="font-size:1.25rem;font-weight:600;">For Employers</h3>
          </div>
          <div class="step-list">
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">01</span>
                <div class="step-line"></div>
              </div>
              <div class="step-body">
                <h4>Tell us what you need</h4>
                <p>Job type, number of workers, date and time.</p>
              </div>
            </div>
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">02</span>
                <div class="step-line"></div>
              </div>
              <div class="step-body">
                <h4>We find the workers</h4>
                <p>Our network of vetted workers gets notified instantly.</p>
              </div>
            </div>
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">03</span>
                <div class="step-line"></div>
              </div>
              <div class="step-body">
                <h4>Workers show up</h4>
                <p>Confirmed workers arrive ready to work.</p>
              </div>
            </div>
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">04</span>
              </div>
              <div class="step-body">
                <h4>We handle the rest</h4>
                <p>Payroll, taxes, insurance - all taken care of.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- For Workers -->
        <div>
          <div class="step-column-header">
            <span class="step-col-badge step-col-badge-w">W</span>
            <h3 style="font-size:1.25rem;font-weight:600;">For Workers</h3>
          </div>
          <div class="step-list">
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">01</span>
                <div class="step-line"></div>
              </div>
              <div class="step-body">
                <h4>Sign up via text</h4>
                <p>Share your availability and skills.</p>
              </div>
            </div>
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">02</span>
                <div class="step-line"></div>
              </div>
              <div class="step-body">
                <h4>Get matched</h4>
                <p>Receive job offers that fit your schedule.</p>
              </div>
            </div>
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">03</span>
                <div class="step-line"></div>
              </div>
              <div class="step-body">
                <h4>Reply Yes or No</h4>
                <p>Accept what works, decline what doesn't.</p>
              </div>
            </div>
            <div class="step-item">
              <div class="step-indicator">
                <span class="step-number">04</span>
              </div>
              <div class="step-body">
                <h4>Work &amp; get paid</h4>
                <p>Complete the shift, money in your account same day.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       REGION / SERVICE AREA
  ============================================================ -->
  <section class="section section-bg-card">
    <div class="container" style="text-align:center;">
      <div style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;background-color:var(--accent-a10);border-radius:9999px;margin-bottom:1.5rem;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        <span class="text-sm font-medium text-accent">Service Area</span>
      </div>

      <h2 style="margin-bottom:1rem;">Currently serving San Antonio</h2>
      <p class="text-muted" style="font-size:1.125rem;max-width:42rem;margin:0 auto 2rem;line-height:1.625;">
        We're starting local and growing fast. San Antonio is our home base, with expansion across Texas coming soon.
      </p>

      <div class="city-badges">
        <div class="city-badge-active">San Antonio  -  Live Now</div>
        <div class="city-badge-inactive">Austin  -  Coming Soon</div>
        <div class="city-badge-inactive">Houston  -  Coming Soon</div>
        <div class="city-badge-inactive">Dallas  -  Coming Soon</div>
        <div class="city-badge-inactive">Fort Worth  -  Coming Soon</div>
      </div>

      <livewire:home.waitlist-form />
    </div>
  </section>

  <!-- ============================================================
       FAQ
  ============================================================ -->
  <section class="section">
    <div class="container">
      <div style="text-align:center;margin-bottom:3rem;">
        <h2>Frequently Asked Questions</h2>
      </div>

      <div style="display:grid;grid-template-columns:1fr;gap:3rem;">
        <div id="faq-two-col" style="display:grid;grid-template-columns:1fr;gap:3rem;">

          <!-- Employer FAQs -->
          <div>
            <h3 style="font-size:1.125rem;font-weight:600;margin-bottom:1.5rem;">For Employers</h3>
            <div class="accordion">
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  How quickly can I get workers?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">Depending on availability, we can often fill shifts within hours. For best results, give us 24-48 hours notice, but we understand business doesn't always work that way.</div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  What does it cost?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">You pay an hourly rate that covers the worker's wages and our service fee. No hidden fees, no long-term contracts.</div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  Are workers vetted?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">Yes. All workers complete our verification process, which may include identity verification and background screening. We also track performance across all jobs.</div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  What if a worker doesn't show up?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">If there's ever an issue, we work to find a replacement ASAP and you're never charged for no-shows.</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Worker FAQs -->
          <div>
            <h3 style="font-size:1.125rem;font-weight:600;margin-bottom:1.5rem;">For Workers</h3>
            <div class="accordion">
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  How do I get paid?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">Same-day payment via direct deposit. Finish your shift, payment is processed automatically. No waiting for payday, no paper checks.</div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  Do I have to accept every job offer?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">Absolutely not. You only work when you want to. Decline any offer that doesn't fit your schedule - there's no penalty, and it won't affect future offers.</div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  What jobs are available?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">We specialize in roles that can be learned quickly: warehouse work, moving help, event setup, vehicle relocation, general labor. Jobs vary based on local employer needs.</div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-trigger" type="button">
                  Is there a minimum number of hours?
                  <svg class="accordion-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-body">No minimums. Work one shift a month or five shifts a week - it's completely up to you and what opportunities match your availability.</div>
                </div>
              </div>
            </div>
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
      <h2>Ready to simplify staffing?</h2>
      <p>Whether you need workers or want to work, getting started takes less than 5 minutes.</p>
      <div class="cta-actions">
        <a href="{{ route('signup.employer') }}" class="btn btn-inverted btn-lg">
          I Need Workers
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
        <a href="{{ route('signup.worker') }}" class="btn btn-outline-inverted btn-lg">I Want to Work</a>
      </div>
    </div>
  </section>

  <x-site-footer />

  <!-- FAQ responsive layout -->
  <style>
    @media (min-width: 1024px) {
      #faq-two-col { grid-template-columns: 1fr 1fr; }
    }
  </style>

</body>
</html>
