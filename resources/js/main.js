/**
 * ShiftReady — Vanilla JS interactivity
 */

document.addEventListener('DOMContentLoaded', function () {

  // ============================================================
  // MOBILE NAVIGATION (Landing page header)
  // ============================================================
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const mobileMenuIcon = document.getElementById('mobile-menu-icon');
  const mobileMenuCloseIcon = document.getElementById('mobile-menu-close-icon');

  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', function () {
      const isOpen = mobileMenu.classList.toggle('open');
      if (mobileMenuIcon) mobileMenuIcon.style.display = isOpen ? 'none' : 'block';
      if (mobileMenuCloseIcon) mobileMenuCloseIcon.style.display = isOpen ? 'block' : 'none';
    });
  }

  // ============================================================
  // DASHBOARD MOBILE SIDEBAR
  // ============================================================
  const dashMobileBtn = document.getElementById('dash-mobile-btn');
  const dashMobileOverlay = document.getElementById('mobile-sidebar-overlay');
  const dashMobileBackdrop = document.getElementById('mobile-sidebar-backdrop');
  const dashMobileOpenIcon = document.getElementById('dash-mobile-open-icon');
  const dashMobileCloseIcon = document.getElementById('dash-mobile-close-icon');

  function openDashSidebar() {
    if (dashMobileOverlay) dashMobileOverlay.classList.add('open');
    if (dashMobileOpenIcon) dashMobileOpenIcon.style.display = 'none';
    if (dashMobileCloseIcon) dashMobileCloseIcon.style.display = 'block';
  }

  function closeDashSidebar() {
    if (dashMobileOverlay) dashMobileOverlay.classList.remove('open');
    if (dashMobileOpenIcon) dashMobileOpenIcon.style.display = 'block';
    if (dashMobileCloseIcon) dashMobileCloseIcon.style.display = 'none';
  }

  if (dashMobileBtn) {
    dashMobileBtn.addEventListener('click', function () {
      const isOpen = dashMobileOverlay && dashMobileOverlay.classList.contains('open');
      if (isOpen) { closeDashSidebar(); } else { openDashSidebar(); }
    });
  }
  if (dashMobileBackdrop) {
    dashMobileBackdrop.addEventListener('click', closeDashSidebar);
  }

  // ============================================================
  // PASSWORD TOGGLE
  // ============================================================
  document.querySelectorAll('[data-password-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const targetId = btn.getAttribute('data-password-toggle');
      const input = document.getElementById(targetId);
      if (!input) return;
      const isPassword = input.type === 'password';
      input.type = isPassword ? 'text' : 'password';
      const eyeIcon = btn.querySelector('[data-icon-eye]');
      const eyeOffIcon = btn.querySelector('[data-icon-eye-off]');
      if (eyeIcon) eyeIcon.style.display = isPassword ? 'none' : 'block';
      if (eyeOffIcon) eyeOffIcon.style.display = isPassword ? 'block' : 'none';
    });
  });

  // ============================================================
  // LOGIN USER TYPE TOGGLE
  // ============================================================
  const userTypeBtns = document.querySelectorAll('[data-user-type]');
  const workerFields = document.getElementById('worker-login-fields');
  const employerFields = document.getElementById('employer-login-fields');
  const signupLink = document.getElementById('signup-link');
  const signupLinkText = document.getElementById('signup-link-text');

  if (userTypeBtns.length) {
    userTypeBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const type = btn.getAttribute('data-user-type');
        userTypeBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        if (workerFields) workerFields.style.display = type === 'worker' ? 'block' : 'none';
        if (employerFields) employerFields.style.display = type === 'employer' ? 'block' : 'none';

        if (signupLink) {
          signupLink.href = type === 'worker' ? 'signup-worker.html' : 'signup-employer.html';
        }
        if (signupLinkText) {
          signupLinkText.textContent = type === 'worker' ? 'a worker' : 'an employer';
        }
      });
    });
  }

  // ============================================================
  // MULTI-STEP WIZARD
  // ============================================================
  const wizardForms = document.querySelectorAll('[data-wizard]');

  wizardForms.forEach(function (wizard) {
    const totalSteps = parseInt(wizard.getAttribute('data-wizard'), 10);
    let currentStep = 1;

    const progressBars = wizard.querySelectorAll('[data-step-bar]');
    const stepLabel = wizard.querySelector('[data-step-label]');
    const stepPanels = wizard.querySelectorAll('[data-step-panel]');

    function showStep(step) {
      currentStep = step;

      // Update progress bars
      progressBars.forEach(function (bar, i) {
        bar.classList.toggle('active', i + 1 <= step);
      });

      // Update label
      if (stepLabel) {
        stepLabel.textContent = 'Step ' + step + ' of ' + totalSteps;
      }

      // Show/hide panels
      stepPanels.forEach(function (panel) {
        const panelStep = parseInt(panel.getAttribute('data-step-panel'), 10);
        panel.classList.toggle('active', panelStep === step);
      });
    }

    // Next buttons
    wizard.querySelectorAll('[data-next-step]').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        // If inside a form, do basic validation
        const form = btn.closest('form');
        if (form && !form.checkValidity()) {
          form.reportValidity();
          return;
        }
        if (currentStep < totalSteps) {
          showStep(currentStep + 1);
        }
      });
    });

    // Back buttons
    wizard.querySelectorAll('[data-prev-step]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (currentStep > 1) {
          showStep(currentStep - 1);
        }
      });
    });

    // Initialize
    showStep(1);
  });

  // ============================================================
  // FAQ ACCORDION
  // ============================================================
  document.querySelectorAll('.accordion-trigger').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      const item = trigger.closest('.accordion-item');
      if (!item) return;

      const isOpen = item.classList.contains('open');

      // Close all in same accordion
      const accordion = item.closest('.accordion');
      if (accordion) {
        accordion.querySelectorAll('.accordion-item').forEach(function (i) {
          i.classList.remove('open');
        });
      }

      // Toggle current
      if (!isOpen) {
        item.classList.add('open');
      }
    });
  });

  // ============================================================
  // DROPDOWN MENUS
  // ============================================================
  document.querySelectorAll('[data-dropdown-trigger]').forEach(function (trigger) {
    trigger.addEventListener('click', function (e) {
      e.stopPropagation();
      const targetId = trigger.getAttribute('data-dropdown-trigger');
      const dropdown = document.getElementById(targetId);
      if (!dropdown) return;

      const isOpen = dropdown.classList.contains('open');

      // Close all dropdowns
      document.querySelectorAll('.dropdown-menu.open').forEach(function (d) {
        d.classList.remove('open');
      });

      if (!isOpen) {
        dropdown.classList.add('open');
      }
    });
  });

  // Close dropdowns when clicking outside
  document.addEventListener('click', function () {
    document.querySelectorAll('.dropdown-menu.open').forEach(function (d) {
      d.classList.remove('open');
    });
  });

  // ============================================================
  // MODAL / DIALOG
  // ============================================================
  document.querySelectorAll('[data-modal-open]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const modalId = btn.getAttribute('data-modal-open');
      const modal = document.getElementById(modalId);
      if (modal) modal.classList.add('open');
    });
  });

  document.querySelectorAll('[data-modal-close]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const modalId = btn.getAttribute('data-modal-close');
      const modal = document.getElementById(modalId);
      if (modal) modal.classList.remove('open');
    });
  });

  // Close modal on overlay click
  document.querySelectorAll('.modal-overlay').forEach(function (overlay) {
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) {
        overlay.classList.remove('open');
      }
    });
  });

  // Close modal on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.modal-overlay.open').forEach(function (m) {
        m.classList.remove('open');
      });
    }
  });

  // ============================================================
  // SHIFTS PAGE — STATUS FILTER TABS
  // ============================================================
  const filterTabs = document.querySelectorAll('.filter-tab[data-filter-status]');
  const tableRows = document.querySelectorAll('[data-shift-status]');
  const tableEmpty = document.querySelector('.table-empty');

  function applyFilters() {
    const activeTab = document.querySelector('.filter-tab[data-filter-status].active');
    const activeStatus = activeTab ? activeTab.getAttribute('data-filter-status') : 'all';

    const roleFilter = document.getElementById('role-filter');
    const activeRole = roleFilter ? roleFilter.value : 'all';

    const searchInput = document.getElementById('shift-search');
    const searchQuery = searchInput ? searchInput.value.toLowerCase() : '';

    let visibleCount = 0;

    tableRows.forEach(function (row) {
      const rowStatus = row.getAttribute('data-shift-status');
      const rowRole = row.getAttribute('data-shift-role') || '';
      const rowText = row.textContent.toLowerCase();

      const matchesStatus = activeStatus === 'all' || rowStatus === activeStatus;
      const matchesRole = activeRole === 'all' || rowRole === activeRole;
      const matchesSearch = !searchQuery || rowText.includes(searchQuery);

      const visible = matchesStatus && matchesRole && matchesSearch;
      row.classList.toggle('table-row-hidden', !visible);
      if (visible) visibleCount++;
    });

    // Update empty state
    if (tableEmpty) {
      tableEmpty.classList.toggle('visible', visibleCount === 0);
    }

    // Update count label
    const countLabel = document.getElementById('shifts-count');
    if (countLabel) {
      const statusText = activeStatus !== 'all' ? ` (${activeStatus})` : '';
      countLabel.textContent = visibleCount + ' shift' + (visibleCount !== 1 ? 's' : '') + statusText;
    }
  }

  if (filterTabs.length) {
    filterTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        filterTabs.forEach(function (t) { t.classList.remove('active'); });
        tab.classList.add('active');
        applyFilters();
      });
    });
  }

  const shiftSearch = document.getElementById('shift-search');
  if (shiftSearch) {
    shiftSearch.addEventListener('input', applyFilters);
  }

  const roleFilter = document.getElementById('role-filter');
  if (roleFilter) {
    roleFilter.addEventListener('change', applyFilters);
  }

  // Initialize filter on load
  if (filterTabs.length) applyFilters();

  // "Clear filters" button
  const clearFilters = document.getElementById('clear-filters');
  if (clearFilters) {
    clearFilters.addEventListener('click', function () {
      if (shiftSearch) shiftSearch.value = '';
      if (roleFilter) roleFilter.value = 'all';
      filterTabs.forEach(function (t) { t.classList.remove('active'); });
      const allTab = document.querySelector('.filter-tab[data-filter-status="all"]');
      if (allTab) allTab.classList.add('active');
      applyFilters();
    });
  }

});
