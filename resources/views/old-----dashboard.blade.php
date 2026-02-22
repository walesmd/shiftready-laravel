<x-dashboard-layout>
    @php
        $isEmployer = auth()->user()->user_type === \App\Enums\UserType::Employer;
        $displayName = $isEmployer
            ? (auth()->user()->employerProfile->company_name ?? auth()->user()->name)
            : auth()->user()->name;
    @endphp

    <div class="page-header">
        <div>
            <h1>Welcome back, {{ $displayName }}</h1>
            <p>Here's what's happening today.</p>
        </div>
    </div>
</x-dashboard-layout>
