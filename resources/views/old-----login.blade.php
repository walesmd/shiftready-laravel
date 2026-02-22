<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In — {{ config('app.name') }}</title>
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
      <div class="auth-form-inner">

        <x-auth.back-link />

        <x-logo />

        <h1 class="auth-heading">Welcome back</h1>
        <p class="auth-subheading">Sign in to your account to continue</p>

        <!-- User type toggle -->
        <div class="user-type-toggle" style="margin-top:2rem;">
          <button type="button" class="user-type-btn active" data-user-type="worker">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Worker
          </button>
          <button type="button" class="user-type-btn" data-user-type="employer">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
            Employer
          </button>
        </div>

        <form class="space-y-6">

          <!-- Worker email field -->
          <div id="worker-login-fields">
            <label class="form-label" for="login-email-worker">Phone number or email</label>
            <input
              id="login-email-worker"
              type="text"
              class="form-input"
              placeholder="(210) 555-0123 or email@example.com"
            />
          </div>

          <!-- Employer email field -->
          <div id="employer-login-fields" style="display:none;">
            <label class="form-label" for="login-email-employer">Email</label>
            <input
              id="login-email-employer"
              type="email"
              class="form-input"
              placeholder="you@company.com"
            />
          </div>

          <!-- Password -->
          <div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.375rem;">
              <label class="form-label" for="login-password" style="margin-bottom:0;">Password</label>
              <a href="#" class="forgot-link">Forgot password?</a>
            </div>
            <div class="input-password-wrapper">
              <input
                id="login-password"
                type="password"
                class="form-input"
                placeholder="Enter your password"
              />
              <button type="button" class="password-toggle" data-password-toggle="login-password">
                <span data-icon-eye>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                </span>
                <span data-icon-eye-off style="display:none;">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                </span>
              </button>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-lg btn-w-full">Sign in</button>
        </form>

        <p class="text-sm text-muted" style="text-align:center;margin-top:2rem;">
          Don't have an account?
          <a id="signup-link" href="/signup/worker" class="auth-footer-link">Sign up as <span id="signup-link-text">a worker</span></a>
        </p>
      </div>
    </div>

    <!-- ============================================================
         RIGHT SIDE — TESTIMONIAL
    ============================================================ -->
    <div class="auth-visual-side" style="justify-content:space-between;">
      <div></div>

      <div>
        <blockquote class="testimonial-blockquote">
          "{{ config('app.name') }} changed how I make extra money. I just reply YES to a text, show up, and get paid the same day. It's that simple."
        </blockquote>
        <div class="testimonial-meta" style="margin-top:2rem;">
          <p class="author-name">Marcus J.</p>
          <p class="author-role">{{ config('app.name') }} Worker, San Antonio</p>
        </div>
      </div>

      <div class="auth-stats">
        <div>
          <span class="auth-stat-value">500+</span>
          Active Workers
        </div>
        <div class="auth-stat-divider"></div>
        <div>
          <span class="auth-stat-value">50+</span>
          Partner Employers
        </div>
        <div class="auth-stat-divider"></div>
        <div>
          <span class="auth-stat-value">$2M+</span>
          Paid to Workers
        </div>
      </div>
    </div>

  </div>

</body>
</html>
