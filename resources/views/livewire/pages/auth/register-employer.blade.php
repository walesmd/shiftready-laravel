<?php

use App\Data\ProfileOptions;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component
{
    public int $step = 1;

    // Step 1: Contact Info
    public string $companyName = '';
    public string $firstName = '';
    public string $lastName = '';
    public string $title = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';

    // Step 2: Business Details
    public string $industry = '';
    public string $rawAddress = '';
    public string $placeId = '';
    public string $workerCount = '';
    public string $roles = '';

    // Step 3: Terms
    public bool $agreeTerms = false;
    public bool $agreeAuthorization = false;

    public function nextStep(): void
    {
        match ($this->step) {
            1 => $this->validate([
                'companyName' => ['required', 'string', 'max:255'],
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'phone' => ['required', 'string', 'max:20'],
                'password' => ['required', 'string', Rules\Password::defaults()],
            ]),
            2 => $this->validate([
                'industry' => ['required', 'string', 'in:'.implode(',', ProfileOptions::industriesAndWorkTypeValues())],
                'rawAddress' => ['required', 'string', 'max:255'],
                'workerCount' => ['required', 'string', 'in:'.implode(',', ProfileOptions::workerCountValues())],
            ]),
            default => null,
        };

        $this->step++;
    }

    public function prevStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function register(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);
        $this->validate([
            'agreeTerms' => ['accepted'],
            'agreeAuthorization' => ['accepted'],
        ]);

        $user = DB::transaction(function () {
            $user = User::create([
                'name' => trim($this->firstName . ' ' . $this->lastName),
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'user_type' => UserType::Employer,
            ]);

            $profile = $user->employerProfile()->create([
                'company_name' => $this->companyName,
                'title' => $this->title,
                'phone' => $this->phone,
                'industry' => $this->industry,
                'worker_count' => $this->workerCount,
                'roles' => $this->roles,
            ]);

            $profile->setAddress($this->rawAddress, $this->placeId ?: null);

            event(new Registered($user));

            return $user;
        });

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<x-slot:visual>
    <x-auth.visual-side>
        <div class="auth-visual-content">
            <h2>Why businesses choose us</h2>
            <p>Join 50+ San Antonio businesses who simplified their staffing</p>

            <div class="auth-benefit-list">
                <x-auth.benefit-item title="Zero payroll headaches" description="We handle all W-2s, taxes, and compliance.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>

                <x-auth.benefit-item title="Pre-vetted workers" description="Background-checked and ready to work.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>

                <x-auth.benefit-item title="Fill shifts fast" description="Most shifts filled within 2 hours.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>

                <x-auth.benefit-item title="Fully insured" description="Workers comp and liability covered.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>
            </div>

            <div class="testimonial-box">
                <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1rem;">
                    <div style="width:3rem;height:3rem;border-radius:9999px;background-color:var(--primary-foreground-a20);display:flex;align-items:center;justify-content:center;font-size:0.875rem;font-weight:500;flex-shrink:0;">
                        RM
                    </div>
                    <div>
                        <p style="font-weight:600;">Robert Martinez</p>
                        <p style="font-size:0.875rem;color:var(--primary-foreground-a70);">Operations Director, SA Airport Parking</p>
                    </div>
                </div>
                <p style="font-size:0.875rem;color:var(--primary-foreground-a70);">
                    "We went from spending 15 hours a week on staffing to zero. ShiftReady handles everything. We just tell them how many drivers we need and they show up ready to work."
                </p>
                <div style="display:flex;align-items:center;gap:1rem;margin-top:1rem;padding-top:1rem;border-top:1px solid var(--primary-foreground-a20);">
                    <div>
                        <p style="font-size:1.5rem;font-weight:700;">60%</p>
                        <p style="font-size:0.75rem;color:var(--primary-foreground-a60);">Time saved on staffing</p>
                    </div>
                    <div style="width:1px;height:2rem;background-color:var(--primary-foreground-a20);"></div>
                    <div>
                        <p style="font-size:1.5rem;font-weight:700;">98%</p>
                        <p style="font-size:0.75rem;color:var(--primary-foreground-a60);">Shift fill rate</p>
                    </div>
                </div>
            </div>
        </div>
    </x-auth.visual-side>
</x-slot:visual>

<div class="auth-form-inner">

    <x-auth.back-link />

    <x-auth.logo />

    <h1 class="auth-heading">Get started for your business</h1>
    <p class="auth-subheading">Create your employer account to start filling shifts</p>

    <!-- Worker prompt -->
    <div class="card" style="margin-top:1.5rem;">
        <div class="card-content" style="display:flex;align-items:center;justify-content:space-between;gap:1rem;">
            <p style="font-size:0.875rem;margin:0;">
                Are you a worker looking to earn?<br />
                <a href="{{ route('signup.worker') }}" wire:navigate class="auth-footer-link">Sign up as a worker &rarr;</a>
            </p>
        </div>
    </div>

    <!-- Progress indicator -->
    <div class="progress-steps">
        <div class="progress-step {{ $step >= 1 ? 'active' : '' }}"></div>
        <div class="progress-step {{ $step >= 2 ? 'active' : '' }}"></div>
        <div class="progress-step {{ $step >= 3 ? 'active' : '' }}"></div>
    </div>
    <p class="step-label">Step {{ $step }} of 3</p>

    <!-- Step 1: Contact Info -->
    @if ($step === 1)
        <form wire:submit="nextStep" class="space-y-5" style="margin-top:2rem;">
            <div>
                <label class="form-label" for="companyName">Company name</label>
                <input id="companyName" type="text" class="form-input" placeholder="Acme Moving Co." wire:model="companyName" required autocomplete="organization" />
                <x-input-error :messages="$errors->get('companyName')" class="mt-2" />
            </div>

            <div class="form-row form-row-2">
                <div>
                    <label class="form-label" for="empFirstName">Your first name</label>
                    <input id="empFirstName" type="text" class="form-input" placeholder="Jane" wire:model="firstName" required autocomplete="given-name" />
                    <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                </div>
                <div>
                    <label class="form-label" for="empLastName">Your last name</label>
                    <input id="empLastName" type="text" class="form-input" placeholder="Smith" wire:model="lastName" required autocomplete="family-name" />
                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                </div>
            </div>

            <div>
                <label class="form-label" for="empTitle">Your title</label>
                <input id="empTitle" type="text" class="form-input" placeholder="Operations Manager" wire:model="title" required autocomplete="organization-title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <label class="form-label" for="empEmail">Work email</label>
                <input id="empEmail" type="email" class="form-input" placeholder="jane@acmemoving.com" wire:model="email" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label class="form-label" for="empPhone">Phone number</label>
                <input id="empPhone" type="tel" class="form-input" placeholder="(210) 555-0123" wire:model="phone" required autocomplete="tel" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div>
                <label class="form-label" for="emp-password">Password</label>
                <x-auth.password-input id="emp-password" placeholder="Create a password" wire:model="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-w-full" wire:loading.attr="disabled">
                <span wire:loading.remove>Continue</span>
                <span wire:loading>Checking...</span>
            </button>
        </form>
    @endif

    <!-- Step 2: Business Details -->
    @if ($step === 2)
        <form wire:submit="nextStep" class="space-y-5" style="margin-top:2rem;">
            <div>
                <label class="form-label" for="industry">Industry</label>
                <select id="industry" class="form-select" wire:model="industry" required>
                    <option value="" disabled>Select your industry</option>
                    @foreach (ProfileOptions::INDUSTRIES_AND_WORK_TYPES as $opt)
                        <option value="{{ $opt['value'] }}">{{ $opt['label'] }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('industry')" class="mt-2" />
            </div>

            <x-address-input wire-raw-address="rawAddress" wire-place-id="placeId" label="Business address" />

            <div>
                <label class="form-label" for="workerCount">How many workers do you typically need per week?</label>
                <select id="workerCount" class="form-select" wire:model="workerCount" required>
                    <option value="" disabled>Select range</option>
                    @foreach (ProfileOptions::WORKER_COUNTS as $opt)
                        <option value="{{ $opt['value'] }}">{{ $opt['label'] }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('workerCount')" class="mt-2" />
            </div>

            <div>
                <label class="form-label" for="roles">What types of roles do you need filled?</label>
                <textarea id="roles" class="form-textarea" placeholder="e.g., Moving helpers, car drivers, box packers..." wire:model="roles"></textarea>
            </div>

            <div style="display:flex;gap:0.75rem;">
                <button type="button" class="btn btn-outline btn-lg" style="flex:1;" wire:click="prevStep">Back</button>
                <button type="submit" class="btn btn-primary btn-lg" style="flex:1;" wire:loading.attr="disabled">
                    <span wire:loading.remove>Continue</span>
                    <span wire:loading>Checking...</span>
                </button>
            </div>
        </form>
    @endif

    <!-- Step 3: Review & Terms -->
    @if ($step === 3)
        <form wire:submit="register" class="space-y-5" style="margin-top:2rem;">
            <div class="alert-accent">
                <h3>You're almost ready!</h3>
                <p>After creating your account, a member of our team will reach out within 24 hours to complete your onboarding.</p>
            </div>

            <div class="card">
                <div class="card-content">
                    <h4 style="font-weight:500;margin-bottom:0.75rem;">What's included:</h4>
                    <ul class="included-list">
                        <li class="included-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            Dedicated account manager
                        </li>
                        <li class="included-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            Custom shift scheduling dashboard
                        </li>
                        <li class="included-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            Real-time worker tracking
                        </li>
                        <li class="included-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            Consolidated weekly invoicing
                        </li>
                        <li class="included-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            24/7 support hotline
                        </li>
                    </ul>
                </div>
            </div>

            <div class="space-y-4">
                <label class="checkbox-label">
                    <input type="checkbox" class="form-checkbox" wire:model="agreeTerms" />
                    <span>
                        I agree to the
                        <a href="#">Terms of Service</a>,
                        <a href="#">Privacy Policy</a>, and
                        <a href="#">Master Service Agreement</a>
                    </span>
                </label>
                <x-input-error :messages="$errors->get('agreeTerms')" class="mt-1" />

                <label class="checkbox-label">
                    <input type="checkbox" class="form-checkbox" wire:model="agreeAuthorization" />
                    <span>
                        I confirm I am authorized to enter into agreements on behalf of my company.
                    </span>
                </label>
                <x-input-error :messages="$errors->get('agreeAuthorization')" class="mt-1" />
            </div>

            <div style="display:flex;gap:0.75rem;">
                <button type="button" class="btn btn-outline btn-lg" style="flex:1;" wire:click="prevStep">Back</button>
                <button type="submit" class="btn btn-primary btn-lg" style="flex:1;" wire:loading.attr="disabled">
                    <span wire:loading.remove>Create account</span>
                    <span wire:loading>Creating...</span>
                </button>
            </div>
        </form>
    @endif

    <p class="text-sm text-muted" style="text-align:center;margin-top:2rem;">
        Already have an account?
        <a href="{{ route('login') }}" class="auth-footer-link" wire:navigate>Sign in</a>
    </p>

</div>
