<footer class="site-footer">
  <div class="footer-grid">
    <div class="footer-brand">
      <a href="{{ route('home') }}" class="logo-link">
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
        <li><a href="{{ route('home') }}#how-it-works">How It Works</a></li>
        <li><a href="#">Contact Sales</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>For Workers</h4>
      <ul>
        <li><a href="{{ route('signup.worker') }}">Sign Up</a></li>
        <li><a href="#">Find Jobs</a></li>
        <li><a href="#">How Payments Work</a></li>
        <li><a href="#">Worker FAQ</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Company</h4>
      <ul>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="{{ route('terms') }}">Terms of Service</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2026 ShiftReady. All rights reserved.</p>
    <p>Made with care in San Antonio, TX</p>
  </div>
</footer>
