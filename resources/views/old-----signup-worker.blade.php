<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Worker Sign Up — {{ config('app.name') }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <div class="auth-layout">

    <!-- ============================================================
         LEFT SIDE — FORM
    ============================================================ -->
    <div class="auth-form-side">
      <div class="auth-form-inner" data-wizard="3">

        <a href="/" class="auth-back-link">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
          Back to home
        </a>

        <div class="auth-logo">
          <div class="auth-logo-mark">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          </div>
          <span>{{ config('app.name') }}</span>
        </div>

        <h1 class="auth-heading">Start earning today</h1>
        <p class="auth-subheading">Create your worker account in just a few steps</p>

        <!-- Progress indicator -->
        <div class="progress-steps">
          <div class="progress-step" data-step-bar="1"></div>
          <div class="progress-step" data-step-bar="2"></div>
          <div class="progress-step" data-step-bar="3"></div>
        </div>
        <p class="step-label" data-step-label>Step 1 of 3</p>

        <!-- ========================
             STEP 1: Personal Info
        ======================== -->
        <div data-step-panel="1" class="step-panel" style="margin-top:2rem;">
          <form class="space-y-5" onsubmit="return false;">
            <div class="form-row form-row-2">
              <div>
                <label class="form-label" for="firstName">First name</label>
                <input id="firstName" type="text" class="form-input" placeholder="John" required />
              </div>
              <div>
                <label class="form-label" for="lastName">Last name</label>
                <input id="lastName" type="text" class="form-input" placeholder="Doe" required />
              </div>
            </div>

            <div>
              <label class="form-label" for="phone">Phone number</label>
              <input id="phone" type="tel" class="form-input" placeholder="(210) 555-0123" required />
              <p class="form-hint">We'll send job offers to this number via text</p>
            </div>

            <div>
              <label class="form-label" for="email">Email</label>
              <input id="email" type="email" class="form-input" placeholder="john@example.com" required />
            </div>

            <div>
              <label class="form-label" for="password">Password</label>
              <div class="input-password-wrapper">
                <input id="password" type="password" class="form-input" placeholder="Create a password" required />
                <button type="button" class="password-toggle" data-password-toggle="password">
                  <span data-icon-eye>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                  </span>
                  <span data-icon-eye-off style="display:none;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                  </span>
                </button>
              </div>
            </div>

            <button type="button" class="btn btn-primary btn-lg btn-w-full" data-next-step>Continue</button>
          </form>
        </div>

        <!-- ========================
             STEP 2: Preferences
        ======================== -->
        <div data-step-panel="2" class="step-panel" style="margin-top:2rem;">
          <form class="space-y-5" onsubmit="return false;">
            <div>
              <label class="form-label" for="zip">ZIP code</label>
              <input id="zip" type="text" class="form-input" placeholder="78201" required />
              <p class="form-hint">We'll match you with jobs near you</p>
            </div>

            <div>
              <label class="form-label">What type of work interests you?</label>
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;margin-top:0.75rem;">
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Moving &amp; lifting</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Warehouse work</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Driving</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Event staffing</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Cleaning</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>General labor</span></label>
              </div>
            </div>

            <div>
              <label class="form-label">When are you typically available?</label>
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;margin-top:0.75rem;">
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Weekday mornings</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Weekday afternoons</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Weekday evenings</span></label>
                <label class="option-label"><input type="checkbox" class="form-checkbox" /><span>Weekends anytime</span></label>
              </div>
            </div>

            <div style="display:flex;gap:0.75rem;">
              <button type="button" class="btn btn-outline btn-lg" style="flex:1;" data-prev-step>Back</button>
              <button type="button" class="btn btn-primary btn-lg" style="flex:1;" data-next-step>Continue</button>
            </div>
          </form>
        </div>

        <!-- ========================
             STEP 3: Terms
        ======================== -->
        <div data-step-panel="3" class="step-panel" style="margin-top:2rem;">
          <form class="space-y-5" onsubmit="return false;">
            <div class="alert-accent">
              <h3>Almost there!</h3>
              <p>Review and agree to our terms to start receiving job offers.</p>
            </div>

            <div class="space-y-4">
              <label class="checkbox-label">
                <input type="checkbox" class="form-checkbox" required />
                <span>
                  I agree to the
                  <a href="#">Terms of Service</a>
                  and
                  <a href="#">Privacy Policy</a>
                </span>
              </label>

              <label class="checkbox-label">
                <input type="checkbox" class="form-checkbox" required />
                <span>
                  I consent to receive job offers and updates via SMS. Message &amp; data rates may apply. Reply STOP to opt out anytime.
                </span>
              </label>

              <label class="checkbox-label">
                <input type="checkbox" class="form-checkbox" required />
                <span>
                  I confirm I am at least 18 years old and legally authorized to work in the United States.
                </span>
              </label>
            </div>

            <div style="display:flex;gap:0.75rem;">
              <button type="button" class="btn btn-outline btn-lg" style="flex:1;" data-prev-step>Back</button>
              <button type="submit" class="btn btn-primary btn-lg" style="flex:1;">Create account</button>
            </div>
          </form>
        </div>

        <p class="text-sm text-muted" style="text-align:center;margin-top:2rem;">
          Already have an account?
          <a href="/login" class="auth-footer-link">Sign in</a>
        </p>

      </div><!-- /auth-form-inner -->
    </div>

    <!-- ============================================================
         RIGHT SIDE — BENEFITS
    ============================================================ -->
    <div class="auth-visual-side" style="justify-content:center;">
      <div class="auth-visual-content">
        <h2>Why workers love us</h2>
        <p>Join hundreds of workers in San Antonio already earning with {{ config('app.name') }}</p>

        <div class="auth-benefit-list">
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
            </div>
            <div>
              <h3>Text-based jobs</h3>
              <p>Get job offers via text. Reply YES or NO.</p>
            </div>
          </div>
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div>
              <h3>Same-day pay</h3>
              <p>Get paid immediately after completing a shift.</p>
            </div>
          </div>
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
              <h3>Your schedule</h3>
              <p>Only work when it fits your life.</p>
            </div>
          </div>
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <h3>Local jobs</h3>
              <p>Find work close to where you are.</p>
            </div>
          </div>
        </div>

        <!-- Testimonial -->
        <div class="testimonial-box">
          <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
            <div class="avatar-stack">
              <div class="avatar-stack-item">MJ</div>
              <div class="avatar-stack-item">KR</div>
              <div class="avatar-stack-item">TS</div>
            </div>
            <div style="display:flex;gap:0.25rem;">
              <!-- 5 stars -->
              <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent)" stroke="var(--accent)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent)" stroke="var(--accent)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent)" stroke="var(--accent)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent)" stroke="var(--accent)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent)" stroke="var(--accent)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
          </div>
          <p style="font-size:0.875rem;color:var(--primary-foreground-a70);">
            "I made $400 last week just picking up shifts when my kids were at school. The flexibility is unmatched."
          </p>
          <p style="font-size:0.875rem;font-weight:500;margin-top:0.5rem;">Sarah T. - San Antonio Worker</p>
        </div>

      </div>
    </div>

  </div>

</body>
</html>
