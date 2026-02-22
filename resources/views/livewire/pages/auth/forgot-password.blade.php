<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<x-slot:visual>
    <x-auth.visual-side justify="space-between">
        <div></div>

        <div>
            <blockquote class="testimonial-blockquote">
                "{{ config('app.name') }} changed how I make extra money. I just reply YES to a text, show up, and get paid the same day. It's that simple."
            </blockquote>
            <div class="testimonial-meta" style="margin-top:2rem;">
                <p class="author-name">Marcus J.</p>
                <p class="author-role">{{ config('app.name') }} Worker, San Antonio</p>
            </div>
        </div>

        <div class="auth-stats">
            <div>
                <span class="auth-stat-value">500+</span>
                Active Workers
            </div>
            <div class="auth-stat-divider"></div>
            <div>
                <span class="auth-stat-value">50+</span>
                Partner Employers
            </div>
            <div class="auth-stat-divider"></div>
            <div>
                <span class="auth-stat-value">$2M+</span>
                Paid to Workers
            </div>
        </div>
    </x-auth.visual-side>
</x-slot:visual>

<div class="auth-form-inner">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-auth.back-link href="{{ route('login') }}" />

    <x-logo />

    <h1 class="auth-heading">Forgot your password?</h1>
    <p class="auth-subheading">No problem. Enter your email and we'll send you a reset link.</p>

    <form wire:submit="sendPasswordResetLink" class="space-y-6" style="margin-top:2rem;">
        <div>
            <label class="form-label" for="email">Email</label>
            <input
                id="email"
                type="email"
                class="form-input"
                placeholder="you@example.com"
                wire:model="email"
                required
                autofocus
                autocomplete="email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-w-full" wire:loading.attr="disabled">
            <span wire:loading.remove>Send reset link</span>
            <span wire:loading>Sending...</span>
        </button>
    </form>

    <p class="text-sm text-muted" style="text-align:center;margin-top:2rem;">
        Remember your password?
        <a href="{{ route('login') }}" class="auth-footer-link" wire:navigate>Sign in</a>
    </p>

</div>
