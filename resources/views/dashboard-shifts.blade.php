<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shifts — ShiftReady</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <div class="dashboard-wrapper">

    <!-- ============================================================
         DASHBOARD HEADER
    ============================================================ -->
    <header class="dashboard-header">
      <div class="dashboard-header-inner">

        <div class="dashboard-header-left">
          <button type="button" id="dash-mobile-btn" class="btn btn-ghost btn-icon" aria-label="Toggle sidebar">
            <span id="dash-mobile-open-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            </span>
            <span id="dash-mobile-close-icon" style="display:none;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </span>
          </button>

          <a href="{{ route('dashboard') }}" class="logo-link">
            <div class="logo-mark"><span>SR</span></div>
            <span class="logo-text" style="display:none;">ShiftReady</span>
          </a>
        </div>

        <div style="display:flex;align-items:center;gap:0.75rem;">
          <div class="dropdown-wrapper bell-btn">
            <button type="button" class="btn btn-ghost btn-icon" style="position:relative;" aria-label="Notifications">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
              <span class="bell-dot"></span>
            </button>
          </div>

          <div class="dropdown-wrapper">
            <button type="button" class="user-menu-trigger" data-dropdown-trigger="user-dropdown-shifts">
              <div style="width:2rem;height:2rem;background-color:var(--muted);border-radius:9999px;display:flex;align-items:center;justify-content:center;">
                <span style="font-size:0.875rem;font-weight:500;">AC</span>
              </div>
              <div style="display:none;text-align:left;" class="sm:block">
                <p style="font-size:0.875rem;font-weight:500;line-height:1.25;">Acme Logistics</p>
                <p style="font-size:0.75rem;color:var(--muted-foreground);line-height:1;">Admin</p>
              </div>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--muted-foreground);"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div id="user-dropdown-shifts" class="dropdown-menu" style="min-width:14rem;">
              <button class="dropdown-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                Account Settings
              </button>
              <div class="dropdown-separator"></div>
              <button class="dropdown-item dropdown-item-destructive">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                Sign out
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="dashboard-body">

      <!-- DESKTOP SIDEBAR -->
      <aside class="dashboard-sidebar">
        <nav class="sidebar-nav">
          <a href="{{ route('dashboard') }}" class="sidebar-link">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
            Overview
          </a>
          <a href="/shifts" class="sidebar-link active">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            Shifts
          </a>
          <a href="#" class="sidebar-link">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Timesheet
          </a>
          <a href="#" class="sidebar-link">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Workers
          </a>
          <a href="#" class="sidebar-link">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
            Settings
          </a>
        </nav>
        <div class="sidebar-promo">
          <div class="sidebar-promo-box">
            <p>Need more workers?</p>
            <p>Post a new shift and we will find workers for you.</p>
            <button type="button" class="btn btn-primary btn-sm btn-w-full" style="margin-top:0.75rem;" data-modal-open="post-shift-modal">Post a Shift</button>
          </div>
        </div>
      </aside>

      <!-- MOBILE SIDEBAR OVERLAY -->
      <div id="mobile-sidebar-overlay" class="mobile-sidebar-overlay">
        <div id="mobile-sidebar-backdrop" class="mobile-sidebar-backdrop"></div>
        <aside class="mobile-sidebar-panel">
          <nav class="sidebar-nav">
            <a href="{{ route('dashboard') }}" class="sidebar-link">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
              Overview
            </a>
            <a href="/shifts" class="sidebar-link active">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              Shifts
            </a>
          </nav>
        </aside>
      </div>

      <!-- ============================================================
           MAIN CONTENT
      ============================================================ -->
      <main class="dashboard-main">
        <div class="dashboard-content">

          <!-- Page Header -->
          <div class="page-header">
            <div>
              <h1>Shifts</h1>
              <p>Manage and track all your staffing shifts</p>
            </div>
            <button type="button" class="btn btn-primary" data-modal-open="post-shift-modal">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
              Post New Shift
            </button>
          </div>

          <!-- Status Filter Tabs -->
          <div class="filter-tabs">
            <button class="filter-tab active" data-filter-status="all">
              All <span class="filter-tab-count">10</span>
            </button>
            <button class="filter-tab" data-filter-status="open">
              Open <span class="filter-tab-count">1</span>
            </button>
            <button class="filter-tab" data-filter-status="recruiting">
              Recruiting <span class="filter-tab-count">2</span>
            </button>
            <button class="filter-tab" data-filter-status="pending">
              Pending <span class="filter-tab-count">1</span>
            </button>
            <button class="filter-tab" data-filter-status="confirmed">
              Confirmed <span class="filter-tab-count">3</span>
            </button>
            <button class="filter-tab" data-filter-status="completed">
              Completed <span class="filter-tab-count">2</span>
            </button>
          </div>

          <!-- Filters Bar -->
          <div class="card">
            <div class="card-content p-4">
              <div class="filters-bar">
                <div class="input-search-wrapper">
                  <span class="input-search-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                  </span>
                  <input
                    type="text"
                    id="shift-search"
                    class="form-input"
                    placeholder="Search by role, location, or worker..."
                  />
                </div>
                <div class="filters-bar-right">
                  <div class="filter-select-wrapper">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                    <select id="role-filter" class="form-select">
                      <option value="all">All Roles</option>
                      <option value="Warehouse Packer">Warehouse Packer</option>
                      <option value="Moving Assistant">Moving Assistant</option>
                      <option value="Lot Driver">Lot Driver</option>
                      <option value="Event Setup">Event Setup</option>
                      <option value="Furniture Mover">Furniture Mover</option>
                      <option value="Box Packer">Box Packer</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Shifts Table -->
          <div class="card">
            <div class="card-header pb-0">
              <p class="card-title text-sm" style="font-size:0.875rem;font-weight:500;" id="shifts-count">10 shifts</p>
            </div>
            <div class="card-content p-0">
              <div class="overflow-x-auto">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th><div class="th-inner"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg> Date</div></th>
                      <th><div class="th-inner"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Time</div></th>
                      <th>Role</th>
                      <th><div class="th-inner"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> Location</div></th>
                      <th><div class="th-inner"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Worker</div></th>
                      <th><div class="th-inner"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> Pay</div></th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- Shift 1001: Warehouse Packer / confirmed -->
                    <tr data-shift-status="confirmed" data-shift-role="Warehouse Packer">
                      <td style="font-weight:500;">Mon, Jan 20</td>
                      <td style="color:var(--muted-foreground);">2:00 PM - 6:00 PM</td>
                      <td style="font-weight:500;">Warehouse Packer</td>
                      <td>
                        <p style="font-size:0.875rem;">Main Warehouse</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">1200 Commerce St, San Antonio</p>
                      </td>
                      <td>
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                          <div class="worker-avatar">MJ</div>
                          <span style="font-size:0.875rem;">Marcus Johnson</span>
                        </div>
                      </td>
                      <td style="font-weight:600;color:var(--accent);">$68</td>
                      <td><span class="badge badge-confirmed"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg> Confirmed</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1001" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1001" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg> Edit Shift</button>
                            <button class="dropdown-item dropdown-item-destructive"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg> Cancel Shift</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1002: Moving Assistant / recruiting -->
                    <tr data-shift-status="recruiting" data-shift-role="Moving Assistant">
                      <td style="font-weight:500;">Mon, Jan 20</td>
                      <td style="color:var(--muted-foreground);">4:00 PM - 8:00 PM</td>
                      <td style="font-weight:500;">Moving Assistant</td>
                      <td>
                        <p style="font-size:0.875rem;">Industrial Hub</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">845 Industrial Blvd, San Antonio</p>
                      </td>
                      <td><span style="font-size:0.875rem;color:var(--muted-foreground);font-style:italic;">Finding worker...</span></td>
                      <td style="font-weight:600;color:var(--accent);">$80</td>
                      <td><span class="badge badge-recruiting"><svg class="animate-spin" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Recruiting</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1002" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1002" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg> Edit Shift</button>
                            <button class="dropdown-item dropdown-item-destructive"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg> Cancel Shift</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1003: Lot Driver / confirmed -->
                    <tr data-shift-status="confirmed" data-shift-role="Lot Driver">
                      <td style="font-weight:500;">Tue, Jan 21</td>
                      <td style="color:var(--muted-foreground);">6:00 AM - 12:00 PM</td>
                      <td style="font-weight:500;">Lot Driver</td>
                      <td>
                        <p style="font-size:0.875rem;">SA Airport Parking</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">9800 Airport Blvd, San Antonio</p>
                      </td>
                      <td>
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                          <div class="worker-avatar">DR</div>
                          <span style="font-size:0.875rem;">David Rodriguez</span>
                        </div>
                      </td>
                      <td style="font-weight:600;color:var(--accent);">$96</td>
                      <td><span class="badge badge-confirmed"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg> Confirmed</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1003" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1003" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg> Edit Shift</button>
                            <button class="dropdown-item dropdown-item-destructive"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg> Cancel Shift</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1004: Warehouse Packer / pending -->
                    <tr data-shift-status="pending" data-shift-role="Warehouse Packer">
                      <td style="font-weight:500;">Tue, Jan 21</td>
                      <td style="color:var(--muted-foreground);">8:00 AM - 12:00 PM</td>
                      <td style="font-weight:500;">Warehouse Packer</td>
                      <td>
                        <p style="font-size:0.875rem;">Main Warehouse</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">1200 Commerce St, San Antonio</p>
                      </td>
                      <td><span style="font-size:0.875rem;color:var(--muted-foreground);font-style:italic;">Unassigned</span></td>
                      <td style="font-weight:600;color:var(--accent);">$68</td>
                      <td><span class="badge badge-pending"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg> Pending</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1004" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1004" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg> Edit Shift</button>
                            <button class="dropdown-item dropdown-item-destructive"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg> Cancel Shift</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1005: Event Setup / open -->
                    <tr data-shift-status="open" data-shift-role="Event Setup">
                      <td style="font-weight:500;">Wed, Jan 22</td>
                      <td style="color:var(--muted-foreground);">7:00 AM - 3:00 PM</td>
                      <td style="font-weight:500;">Event Setup</td>
                      <td>
                        <p style="font-size:0.875rem;">Convention Center</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">900 E Market St, San Antonio</p>
                      </td>
                      <td><span style="font-size:0.875rem;color:var(--muted-foreground);font-style:italic;">Unassigned</span></td>
                      <td style="font-weight:600;color:var(--accent);">$128</td>
                      <td><span class="badge badge-open"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Open</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1005" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1005" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg> Edit Shift</button>
                            <button class="dropdown-item dropdown-item-destructive"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg> Cancel Shift</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1006: Furniture Mover / confirmed -->
                    <tr data-shift-status="confirmed" data-shift-role="Furniture Mover">
                      <td style="font-weight:500;">Wed, Jan 22</td>
                      <td style="color:var(--muted-foreground);">9:00 AM - 1:00 PM</td>
                      <td style="font-weight:500;">Furniture Mover</td>
                      <td>
                        <p style="font-size:0.875rem;">Downtown Office</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">300 Convent St, San Antonio</p>
                      </td>
                      <td>
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                          <div class="worker-avatar">CM</div>
                          <span style="font-size:0.875rem;">Carlos Mendez</span>
                        </div>
                      </td>
                      <td style="font-weight:600;color:var(--accent);">$72</td>
                      <td><span class="badge badge-confirmed"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg> Confirmed</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1006" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1006" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg> Edit Shift</button>
                            <button class="dropdown-item dropdown-item-destructive"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg> Cancel Shift</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1007: Lot Driver / completed -->
                    <tr data-shift-status="completed" data-shift-role="Lot Driver">
                      <td style="font-weight:500;">Sun, Jan 19</td>
                      <td style="color:var(--muted-foreground);">6:00 AM - 12:00 PM</td>
                      <td style="font-weight:500;">Lot Driver</td>
                      <td>
                        <p style="font-size:0.875rem;">SA Airport Parking</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">9800 Airport Blvd, San Antonio</p>
                      </td>
                      <td>
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                          <div class="worker-avatar">SM</div>
                          <span style="font-size:0.875rem;">Sarah Mitchell</span>
                        </div>
                      </td>
                      <td style="font-weight:600;color:var(--accent);">$96</td>
                      <td><span class="badge badge-completed"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg> Completed</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1007" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1007" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1008: Warehouse Packer / completed -->
                    <tr data-shift-status="completed" data-shift-role="Warehouse Packer">
                      <td style="font-weight:500;">Sun, Jan 19</td>
                      <td style="color:var(--muted-foreground);">2:00 PM - 6:00 PM</td>
                      <td style="font-weight:500;">Warehouse Packer</td>
                      <td>
                        <p style="font-size:0.875rem;">Main Warehouse</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">1200 Commerce St, San Antonio</p>
                      </td>
                      <td>
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                          <div class="worker-avatar">JW</div>
                          <span style="font-size:0.875rem;">James Wilson</span>
                        </div>
                      </td>
                      <td style="font-weight:600;color:var(--accent);">$68</td>
                      <td><span class="badge badge-completed"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg> Completed</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1008" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1008" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1009: Moving Assistant / recruiting -->
                    <tr data-shift-status="recruiting" data-shift-role="Moving Assistant">
                      <td style="font-weight:500;">Thu, Jan 23</td>
                      <td style="color:var(--muted-foreground);">10:00 AM - 4:00 PM</td>
                      <td style="font-weight:500;">Moving Assistant</td>
                      <td>
                        <p style="font-size:0.875rem;">Residential</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">4521 Oak Grove, San Antonio</p>
                      </td>
                      <td><span style="font-size:0.875rem;color:var(--muted-foreground);font-style:italic;">Finding worker...</span></td>
                      <td style="font-weight:600;color:var(--accent);">$108</td>
                      <td><span class="badge badge-recruiting"><svg class="animate-spin" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Recruiting</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1009" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1009" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg> Edit Shift</button>
                            <button class="dropdown-item dropdown-item-destructive"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg> Cancel Shift</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Shift 1010: Box Packer / cancelled -->
                    <tr data-shift-status="cancelled" data-shift-role="Box Packer">
                      <td style="font-weight:500;">Sat, Jan 18</td>
                      <td style="color:var(--muted-foreground);">8:00 AM - 4:00 PM</td>
                      <td style="font-weight:500;">Box Packer</td>
                      <td>
                        <p style="font-size:0.875rem;">Distribution Center</p>
                        <p style="font-size:0.75rem;color:var(--muted-foreground);">5600 Logistics Way, San Antonio</p>
                      </td>
                      <td><span style="font-size:0.875rem;color:var(--muted-foreground);">—</span></td>
                      <td style="font-weight:600;color:var(--accent);">$136</td>
                      <td><span class="badge badge-cancelled"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg> Cancelled</span></td>
                      <td>
                        <div class="dropdown-wrapper">
                          <button type="button" class="btn btn-ghost btn-icon btn-sm" data-dropdown-trigger="row-dd-1010" aria-label="Row actions">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                          </button>
                          <div id="row-dd-1010" class="dropdown-menu">
                            <button class="dropdown-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> View Details</button>
                          </div>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>

              <!-- Empty state -->
              <div class="table-empty" id="table-empty">
                <p>No shifts found matching your filters.</p>
                <button type="button" class="btn btn-link" id="clear-filters">Clear filters</button>
              </div>

            </div>
          </div>

        </div><!-- /dashboard-content -->
      </main>

    </div><!-- /dashboard-body -->
  </div><!-- /dashboard-wrapper -->

  <!-- ============================================================
       POST SHIFT MODAL
  ============================================================ -->
  <div id="post-shift-modal" class="modal-overlay">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Post a New Shift</h2>
        <p class="modal-description">Create a new shift and we will start recruiting workers for you.</p>
      </div>

      <div style="display:flex;flex-direction:column;gap:1rem;padding:1rem 0;">

        <div>
          <label class="form-label" for="modal-role">Role</label>
          <select id="modal-role" class="form-select">
            <option value="" disabled selected>Select a role</option>
            <option value="warehouse-packer">Warehouse Packer</option>
            <option value="moving-assistant">Moving Assistant</option>
            <option value="lot-driver">Lot Driver</option>
            <option value="event-setup">Event Setup</option>
            <option value="furniture-mover">Furniture Mover</option>
            <option value="box-packer">Box Packer</option>
          </select>
        </div>

        <div>
          <label class="form-label" for="modal-location">Location</label>
          <select id="modal-location" class="form-select">
            <option value="" disabled selected>Select a location</option>
            <option value="main-warehouse">Main Warehouse - 1200 Commerce St</option>
            <option value="airport">SA Airport Parking - 9800 Airport Blvd</option>
            <option value="industrial">Industrial Hub - 845 Industrial Blvd</option>
            <option value="convention">Convention Center - 900 E Market St</option>
          </select>
        </div>

        <div class="form-row form-row-2">
          <div>
            <label class="form-label" for="modal-date">Date</label>
            <input id="modal-date" type="date" class="form-input" />
          </div>
          <div>
            <label class="form-label" for="modal-workers">Workers Needed</label>
            <input id="modal-workers" type="number" min="1" value="1" class="form-input" />
          </div>
        </div>

        <div class="form-row form-row-2">
          <div>
            <label class="form-label" for="modal-start">Start Time</label>
            <input id="modal-start" type="time" class="form-input" />
          </div>
          <div>
            <label class="form-label" for="modal-end">End Time</label>
            <input id="modal-end" type="time" class="form-input" />
          </div>
        </div>

        <div>
          <label class="form-label" for="modal-pay">Pay Rate ($/hour)</label>
          <input id="modal-pay" type="number" min="15" step="0.5" value="17" class="form-input" />
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-modal-close="post-shift-modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-modal-close="post-shift-modal">Post Shift</button>
      </div>
    </div>
  </div>

  <!-- sm+ logo text -->
  <style>
    @media (min-width: 640px) {
      .logo-text { display: block !important; }
    }
  </style>

</body>
</html>
