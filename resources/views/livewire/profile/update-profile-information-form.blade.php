<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profile Information</h3>
        <p style="font-size:0.875rem;color:var(--muted-foreground);margin-top:0.25rem;">Update your account's profile information and email address.</p>
    </div>
    <div class="card-content">
        <form wire:submit="updateProfileInformation" style="display:flex;flex-direction:column;gap:1.25rem;">
            <div>
                <label class="form-label" for="name">Name</label>
                <input wire:model="name" class="form-input" id="name" name="name" type="text" required autofocus autocomplete="name" />
                @error('name') <p class="form-hint" style="color:var(--destructive);">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="form-label" for="email">Email</label>
                <input wire:model="email" class="form-input" id="email" name="email" type="email" required autocomplete="username" />
                @error('email') <p class="form-hint" style="color:var(--destructive);">{{ $message }}</p> @enderror

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                    <div>
                        <p style="font-size:0.875rem;margin-top:0.5rem;">
                            {{ __('Your email address is unverified.') }}

                            <button wire:click.prevent="sendVerification" style="text-decoration:underline;font-size:0.875rem;color:var(--muted-foreground);">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p style="margin-top:0.5rem;font-size:0.875rem;color:var(--accent);">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div style="display:flex;align-items:center;gap:1rem;">
                <button type="submit" class="btn btn-primary">Save</button>

                <span x-data="{ show: false }"
                      x-on:profile-updated.window="show = true; setTimeout(() => show = false, 2500)"
                      x-show="show"
                      style="font-size:0.875rem;color:var(--accent);display:none;">Saved.</span>
            </div>
        </form>
    </div>
</div>
