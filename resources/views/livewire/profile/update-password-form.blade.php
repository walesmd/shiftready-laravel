<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Password</h3>
        <p class="text-sm text-muted-foreground mt-1">Ensure your account is using a long, random password to stay secure.</p>
    </div>
    <div class="card-content">
        <form wire:submit="updatePassword" class="flex flex-col gap-5">
            <div>
                <label class="form-label" for="update_password_current_password">Current Password</label>
                <input wire:model="current_password" class="form-input" id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
                @error('current_password') <p class="form-hint text-destructive">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="form-label" for="update_password_password">New Password</label>
                <input wire:model="password" class="form-input" id="update_password_password" name="password" type="password" autocomplete="new-password" />
                @error('password') <p class="form-hint text-destructive">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="form-label" for="update_password_password_confirmation">Confirm Password</label>
                <input wire:model="password_confirmation" class="form-input" id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                @error('password_confirmation') <p class="form-hint text-destructive">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="btn btn-primary">Save</button>

                <span x-data="{ show: false }"
                      x-on:password-updated.window="show = true; setTimeout(() => show = false, 2500)"
                      x-show="show"
                      x-cloak
                      class="text-sm text-accent">Saved.</span>
            </div>
        </form>
    </div>
</div>
