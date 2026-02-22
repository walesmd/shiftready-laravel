<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="color:var(--destructive);">Delete Account</h3>
        <p style="font-size:0.875rem;color:var(--muted-foreground);margin-top:0.25rem;">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
    </div>
    <div class="card-content">
        <p style="font-size:0.875rem;color:var(--muted-foreground);margin-bottom:1rem;">Before deleting your account, please download any data or information that you wish to retain.</p>
        <button type="button" class="btn btn-outline" style="color:var(--destructive);border-color:var(--destructive);" data-modal-open="delete-account-modal">
            Delete Account
        </button>
    </div>
</div>

<div id="delete-account-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="delete-account-modal-title" aria-describedby="delete-account-modal-description">
    <div class="modal-content" tabindex="-1">
        <div class="modal-header">
            <h2 id="delete-account-modal-title" class="modal-title">Are you sure you want to delete your account?</h2>
            <p id="delete-account-modal-description" class="modal-description">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.</p>
        </div>

        <form wire:submit="deleteUser">
            <div style="padding:1rem 0;">
                <label class="form-label" for="delete_password">Password</label>
                <input wire:model="password" class="form-input" id="delete_password" name="password" type="password" placeholder="Password" />
                @error('password') <p class="form-hint" style="color:var(--destructive);">{{ $message }}</p> @enderror
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-modal-close="delete-account-modal" aria-label="Close dialog">Cancel</button>
                <button type="submit" class="btn btn-primary" style="background-color:var(--destructive);border-color:var(--destructive);">Delete Account</button>
            </div>
        </form>
    </div>
</div>
</div>
