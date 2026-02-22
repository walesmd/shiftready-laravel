<x-dashboard-layout>
    <div class="page-header">
        <div>
            <h1>Account Settings</h1>
            <p>Manage your account information and preferences.</p>
        </div>
    </div>

    <div style="max-width:48rem;display:flex;flex-direction:column;gap:1.5rem;">
        <livewire:profile.update-profile-information-form />
        <livewire:profile.update-password-form />
        <livewire:profile.delete-user-form />
    </div>
</x-dashboard-layout>
