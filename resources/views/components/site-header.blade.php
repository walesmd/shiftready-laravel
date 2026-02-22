<header class="site-header">
  <div class="site-header-inner">

    <a href="{{ route('home') }}" class="logo-link">
      <x-logo />
    </a>

    <nav class="main-nav">
      <a href="{{ route('home') }}#employers">For Employers</a>
      <a href="{{ route('home') }}#workers">For Workers</a>
      <a href="{{ route('home') }}#how-it-works">How It Works</a>
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
      <a href="{{ route('home') }}#employers">For Employers</a>
      <a href="{{ route('home') }}#workers">For Workers</a>
      <a href="{{ route('home') }}#how-it-works">How It Works</a>
      <a href="{{ route('about') }}">About</a>
    </nav>
    <div class="mobile-nav-actions">
      <a href="{{ route('login') }}" class="btn btn-ghost btn-sm btn-w-full">Log in</a>
      <a href="{{ route('signup.worker') }}" class="btn btn-primary btn-sm btn-w-full">Get Started</a>
    </div>
  </div>
</header>
