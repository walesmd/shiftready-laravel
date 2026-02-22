<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
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

    <x-auth.back-link />

    <x-logo />

    <h1 class="auth-heading">Welcome back</h1>
    <p class="auth-subheading">Sign in to your account to continue</p>

    <form wire:submit="login" class="space-y-6" style="margin-top:2rem;">

        <!-- Email -->
        <div>
            <label class="form-label" for="login-email">Email</label>
            <input
                id="login-email"
                type="email"
                class="form-input"
                placeholder="you@example.com"
                wire:model="form.email"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.375rem;">
                <label class="form-label" for="login-password" style="margin-bottom:0;">Password</label>
                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}" wire:navigate>Forgot password?</a>
                @endif
            </div>
            <x-auth.password-input
                id="login-password"
                wire:model="form.password"
                required
            />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-w-full">Sign in</button>
    </form>

    <p class="text-sm text-muted" style="text-align:center;margin-top:2rem;">
        Don't have an account?
        <a href="{{ route('register') }}" wire:navigate class="auth-footer-link">Sign up</a>
    </p>

</div>
