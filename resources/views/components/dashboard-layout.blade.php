<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script>
        window.Flags = @json(
            collect(\App\Enums\Feature::cases())
                ->mapWithKeys(fn (\App\Enums\Feature $f) => [$f->value => $f->isEnabled()])
                ->all()
        );
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @php
        $isEmployer = auth()->user()->user_type === \App\Enums\UserType::Employer;
        $displayName = $isEmployer
            ? (auth()->user()->employerProfile->company_name ?? auth()->user()->name)
            : auth()->user()->name;
        $initials = collect(explode(' ', $displayName))
            ->map(fn (string $word) => strtoupper(substr($word, 0, 1)))
            ->take(2)
            ->implode('');
    @endphp

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
                        <x-logo />
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
                        <button type="button" class="user-menu-trigger" data-dropdown-trigger="user-dropdown">
                            <div style="width:2rem;height:2rem;background-color:var(--muted);border-radius:9999px;display:flex;align-items:center;justify-content:center;">
                                <span style="font-size:0.875rem;font-weight:500;">{{ $initials }}</span>
                            </div>
                            <div style="display:none;text-align:left;" class="sm:block">
                                <p style="font-size:0.875rem;font-weight:500;line-height:1.25;">{{ $displayName }}</p>
                                <p style="font-size:0.75rem;color:var(--muted-foreground);line-height:1;">{{ $isEmployer ? 'Admin' : 'Worker' }}</p>
                            </div>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--muted-foreground);"><path d="m6 9 6 6 6-6"/></svg>
                        </button>

                        <div id="user-dropdown" class="dropdown-menu" style="min-width:14rem;">
                            <a href="{{ route('profile') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                                Account Settings
                            </a>
                            <div class="dropdown-separator"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item dropdown-item-destructive">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="dashboard-body">

            <!-- DESKTOP SIDEBAR -->
            <aside class="dashboard-sidebar">
                @if ($isEmployer)
                    <x-dashboard.employer-nav />
                @else
                    <x-dashboard.worker-nav />
                @endif
            </aside>

            <!-- MOBILE SIDEBAR OVERLAY -->
            <div id="mobile-sidebar-overlay" class="mobile-sidebar-overlay">
                <div id="mobile-sidebar-backdrop" class="mobile-sidebar-backdrop"></div>
                <aside class="mobile-sidebar-panel">
                    @if ($isEmployer)
                        <x-dashboard.employer-nav />
                    @else
                        <x-dashboard.worker-nav />
                    @endif
                </aside>
            </div>

            <!-- ============================================================
                 MAIN CONTENT
            ============================================================ -->
            <main class="dashboard-main">
                <div class="dashboard-content">
                    {{ $slot }}
                </div>
            </main>

        </div><!-- /dashboard-body -->
    </div><!-- /dashboard-wrapper -->

    <style>
        @media (min-width: 640px) {
            .logo-text { display: block !important; }
        }
    </style>

</body>
</html>
