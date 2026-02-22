<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employer Sign Up — {{ config('app.name') }}</title>
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
    <div class="auth-form-side" style="overflow-y:auto;">
      <div class="auth-form-inner-lg" data-wizard="3">

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

        <h1 class="auth-heading">Get started for your business</h1>
        <p class="auth-subheading">Create your employer account to start filling shifts</p>

        <!-- Progress indicator -->
        <div class="progress-steps">
          <div class="progress-step" data-step-bar="1"></div>
          <div class="progress-step" data-step-bar="2"></div>
          <div class="progress-step" data-step-bar="3"></div>
        </div>
        <p class="step-label" data-step-label>Step 1 of 3</p>

        <!-- ========================
             STEP 1: Contact Info
        ======================== -->
        <div data-step-panel="1" class="step-panel" style="margin-top:2rem;">
          <form class="space-y-5" onsubmit="return false;">
            <div>
              <label class="form-label" for="companyName">Company name</label>
              <input id="companyName" type="text" class="form-input" placeholder="Acme Moving Co." required />
            </div>

            <div class="form-row form-row-2">
              <div>
                <label class="form-label" for="empFirstName">Your first name</label>
                <input id="empFirstName" type="text" class="form-input" placeholder="Jane" required />
              </div>
              <div>
                <label class="form-label" for="empLastName">Your last name</label>
                <input id="empLastName" type="text" class="form-input" placeholder="Smith" required />
              </div>
            </div>

            <div>
              <label class="form-label" for="title">Your title</label>
              <input id="title" type="text" class="form-input" placeholder="Operations Manager" required />
            </div>

            <div>
              <label class="form-label" for="empEmail">Work email</label>
              <input id="empEmail" type="email" class="form-input" placeholder="jane@acmemoving.com" required />
            </div>

            <div>
              <label class="form-label" for="empPhone">Phone number</label>
              <input id="empPhone" type="tel" class="form-input" placeholder="(210) 555-0123" required />
            </div>

            <div>
              <label class="form-label" for="empPassword">Password</label>
              <div class="input-password-wrapper">
                <input id="empPassword" type="password" class="form-input" placeholder="Create a password" required />
                <button type="button" class="password-toggle" data-password-toggle="empPassword">
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
             STEP 2: Business Details
        ======================== -->
        <div data-step-panel="2" class="step-panel" style="margin-top:2rem;">
          <form class="space-y-5" onsubmit="return false;">
            <div>
              <label class="form-label" for="industry">Industry</label>
              <select id="industry" class="form-select">
                <option value="" disabled selected>Select your industry</option>
                <option value="moving">Moving &amp; Logistics</option>
                <option value="warehouse">Warehouse &amp; Distribution</option>
                <option value="automotive">Automotive</option>
                <option value="events">Events &amp; Hospitality</option>
                <option value="retail">Retail</option>
                <option value="manufacturing">Manufacturing</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div>
              <label class="form-label" for="address">Business address</label>
              <input id="address" type="text" class="form-input" placeholder="123 Main Street" required />
            </div>

            <div class="form-row form-row-2">
              <div>
                <label class="form-label" for="city">City</label>
                <input id="city" type="text" class="form-input" placeholder="San Antonio" required />
              </div>
              <div>
                <label class="form-label" for="bizZip">ZIP code</label>
                <input id="bizZip" type="text" class="form-input" placeholder="78201" required />
              </div>
            </div>

            <div>
              <label class="form-label" for="workerCount">How many workers do you typically need per week?</label>
              <select id="workerCount" class="form-select">
                <option value="" disabled selected>Select range</option>
                <option value="1-5">1-5 workers</option>
                <option value="6-15">6-15 workers</option>
                <option value="16-30">16-30 workers</option>
                <option value="31-50">31-50 workers</option>
                <option value="50+">50+ workers</option>
              </select>
            </div>

            <div>
              <label class="form-label" for="roles">What types of roles do you need filled?</label>
              <textarea id="roles" class="form-textarea" placeholder="e.g., Moving helpers, car drivers, box packers..."></textarea>
            </div>

            <div style="display:flex;gap:0.75rem;">
              <button type="button" class="btn btn-outline btn-lg" style="flex:1;" data-prev-step>Back</button>
              <button type="button" class="btn btn-primary btn-lg" style="flex:1;" data-next-step>Continue</button>
            </div>
          </form>
        </div>

        <!-- ========================
             STEP 3: Review & Terms
        ======================== -->
        <div data-step-panel="3" class="step-panel" style="margin-top:2rem;">
          <form class="space-y-5" onsubmit="return false;">
            <div class="alert-accent">
              <h3>You're almost ready!</h3>
              <p>After creating your account, a member of our team will reach out within 24 hours to complete your onboarding.</p>
            </div>

            <!-- What's included -->
            <div class="card">
              <div class="card-content">
                <h4 style="font-weight:500;margin-bottom:0.75rem;">What's included:</h4>
                <ul class="included-list">
                  <li class="included-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    Dedicated account manager
                  </li>
                  <li class="included-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    Custom shift scheduling dashboard
                  </li>
                  <li class="included-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    Real-time worker tracking
                  </li>
                  <li class="included-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    Consolidated weekly invoicing
                  </li>
                  <li class="included-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    24/7 support hotline
                  </li>
                </ul>
              </div>
            </div>

            <div class="space-y-4">
              <label class="checkbox-label">
                <input type="checkbox" class="form-checkbox" required />
                <span>
                  I agree to the
                  <a href="#">Terms of Service</a>,
                  <a href="#">Privacy Policy</a>, and
                  <a href="#">Master Service Agreement</a>
                </span>
              </label>

              <label class="checkbox-label">
                <input type="checkbox" class="form-checkbox" required />
                <span>
                  I confirm I am authorized to enter into agreements on behalf of my company.
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

      </div><!-- /auth-form-inner-lg -->
    </div>

    <!-- ============================================================
         RIGHT SIDE — BENEFITS
    ============================================================ -->
    <div class="auth-visual-side" style="justify-content:center;">
      <div class="auth-visual-content">
        <h2>Why businesses choose us</h2>
        <p>Join 50+ San Antonio businesses who simplified their staffing</p>

        <div class="auth-benefit-list">
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
            </div>
            <div>
              <h3>Zero payroll headaches</h3>
              <p>We handle all W-2s, taxes, and compliance.</p>
            </div>
          </div>
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
              <h3>Pre-vetted workers</h3>
              <p>Background-checked and ready to work.</p>
            </div>
          </div>
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
              <h3>Fill shifts fast</h3>
              <p>Most shifts filled within 2 hours.</p>
            </div>
          </div>
          <div class="auth-benefit-item">
            <div class="icon-box-accent-dark">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
              <h3>Fully insured</h3>
              <p>Workers comp and liability covered.</p>
            </div>
          </div>
        </div>

        <!-- Testimonial -->
        <div class="testimonial-box">
          <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1rem;">
            <div style="width:3rem;height:3rem;border-radius:9999px;background-color:var(--primary-foreground-a20);display:flex;align-items:center;justify-content:center;font-size:0.875rem;font-weight:500;flex-shrink:0;">
              RM
            </div>
            <div>
              <p style="font-weight:600;">Robert Martinez</p>
              <p style="font-size:0.875rem;color:var(--primary-foreground-a70);">Operations Director, SA Airport Parking</p>
            </div>
          </div>
          <p style="font-size:0.875rem;color:var(--primary-foreground-a70);">
            "We went from spending 15 hours a week on staffing to zero. {{ config('app.name') }} handles everything. We just tell them how many drivers we need and they show up ready to work."
          </p>
          <div style="display:flex;align-items:center;gap:1rem;margin-top:1rem;padding-top:1rem;border-top:1px solid var(--primary-foreground-a20);">
            <div>
              <p style="font-size:1.5rem;font-weight:700;">60%</p>
              <p style="font-size:0.75rem;color:var(--primary-foreground-a60);">Time saved on staffing</p>
            </div>
            <div style="width:1px;height:2rem;background-color:var(--primary-foreground-a20);"></div>
            <div>
              <p style="font-size:1.5rem;font-weight:700;">98%</p>
              <p style="font-size:0.75rem;color:var(--primary-foreground-a60);">Shift fill rate</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

</body>
</html>
