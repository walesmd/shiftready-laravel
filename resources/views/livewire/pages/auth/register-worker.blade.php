<?php

use App\Data\ProfileOptions;
use App\Enums\Feature;
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
    public bool $registered = false;

    public int $step = 1;

    // Step 1: Personal Info
    public string $firstName = '';
    public string $lastName = '';
    public string $phone = '';
    public string $email = '';
    public string $password = '';

    // Step 2: Preferences
    public string $rawAddress = '';
    public string $placeId = '';
    public array $workTypes = [];
    public array $availability = [];

    // Step 3: Terms
    public bool $agreeTerms = false;
    public bool $agreeSms = false;
    public bool $confirmAge = false;

    public function nextStep(): void
    {
        match ($this->step) {
            1 => $this->validate([
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:20'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'string', Rules\Password::defaults()],
            ]),
            2 => $this->validate([
                'rawAddress' => ['required', 'string', 'max:255'],
                'workTypes' => ['array'],
                'workTypes.*' => ['string', 'in:'.implode(',', ProfileOptions::industriesAndWorkTypeValues())],
                'availability' => ['array'],
                'availability.*' => ['string', 'in:'.implode(',', ProfileOptions::availabilityValues())],
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
            'agreeTerms' => ['accepted'],
            'agreeSms' => ['accepted'],
            'confirmAge' => ['accepted'],
            'workTypes' => ['array'],
            'workTypes.*' => ['string', 'in:'.implode(',', ProfileOptions::industriesAndWorkTypeValues())],
            'availability' => ['array'],
            'availability.*' => ['string', 'in:'.implode(',', ProfileOptions::availabilityValues())],
        ]);

        $user = DB::transaction(function (): User {
            $user = User::create([
                'name' => trim($this->firstName . ' ' . $this->lastName),
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'user_type' => UserType::Worker,
            ]);

            $profile = $user->workerProfile()->create([
                'phone' => $this->phone,
                'work_types' => $this->workTypes,
                'availability' => $this->availability,
            ]);

            $profile->setAddress($this->rawAddress, $this->placeId ?: null);

            return $user;
        });

        event(new Registered($user));

        if (Feature::DisableSignup->isEnabled()) {
            $this->registered = true;

            return;
        }

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<x-slot:visual>
    <x-auth.visual-side>
        <div class="auth-visual-content">
            <h2>Why workers love us</h2>
            <p>Join hundreds of workers in San Antonio already earning with {{ config('app.name') }}</p>

            <div class="auth-benefit-list">
                <x-auth.benefit-item title="Text-based jobs" description="Get job offers via text. Reply YES or NO.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>

                <x-auth.benefit-item title="Same-day pay" description="Get paid immediately after completing a shift.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>

                <x-auth.benefit-item title="Your schedule" description="Only work when it fits your life.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>

                <x-auth.benefit-item title="Local jobs" description="Find work close to where you are.">
                    <x-slot:icon>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </x-slot:icon>
                </x-auth.benefit-item>
            </div>

            <div class="testimonial-box">
                <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
                    <div class="avatar-stack">
                        <div class="avatar-stack-item">MJ</div>
                        <div class="avatar-stack-item">KR</div>
                        <div class="avatar-stack-item">TS</div>
                    </div>
                    <div style="display:flex;gap:0.25rem;">
                        @for ($i = 0; $i < 5; $i++)
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent)" stroke="var(--accent)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        @endfor
                    </div>
                </div>
                <p style="font-size:0.875rem;color:var(--primary-foreground-a70);">
                    "I made $400 last week just picking up shifts when my kids were at school. The flexibility is unmatched."
                </p>
                <p style="font-size:0.875rem;font-weight:500;margin-top:0.5rem;">Sarah T. - San Antonio Worker</p>
            </div>
        </div>
    </x-auth.visual-side>
</x-slot:visual>

<div class="auth-form-inner">

    <x-auth.back-link />

    <x-logo />

    @if ($registered)
        <h1 class="auth-heading">We'll be in touch soon</h1>
        <p class="auth-subheading">Registration is currently by invitation only.</p>
        <div class="alert-accent" style="margin-top:2rem;">
            <h3>You're on the list!</h3>
            <p>We're expanding and will contact you as soon as we open registration in your area.</p>
        </div>
    @else
        <h1 class="auth-heading">Start earning today</h1>
        <p class="auth-subheading">Create your worker account in just a few steps</p>

        <!-- Employer prompt -->
        <div class="card" style="margin-top:1.5rem;">
            <div class="card-content" style="display:flex;align-items:center;justify-content:space-between;gap:1rem;">
                <p style="font-size:0.875rem;margin:0;">
                    Are you an employer looking to hire?<br />
                    <a href="{{ route('signup.employer') }}" wire:navigate class="auth-footer-link">Sign up as an employer &rarr;</a>
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

        <!-- Step 1: Personal Info -->
        @if ($step === 1)
            <form wire:submit="nextStep" class="space-y-5" style="margin-top:2rem;">
                <div class="form-row form-row-2">
                    <div>
                        <label class="form-label" for="firstName">First name</label>
                        <input id="firstName" type="text" class="form-input" placeholder="John" wire:model="firstName" required autocomplete="given-name" />
                        <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                    </div>
                    <div>
                        <label class="form-label" for="lastName">Last name</label>
                        <input id="lastName" type="text" class="form-input" placeholder="Doe" wire:model="lastName" required autocomplete="family-name" />
                        <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <label class="form-label" for="phone">Phone number</label>
                    <input id="phone" type="tel" class="form-input" placeholder="(210) 555-0123" wire:model="phone" required autocomplete="tel" />
                    <p class="form-hint">We'll send job offers to this number via text</p>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <label class="form-label" for="email">Email</label>
                    <input id="email" type="email" class="form-input" placeholder="john@example.com" wire:model="email" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label class="form-label" for="worker-password">Password</label>
                    <x-auth.password-input id="worker-password" placeholder="Create a password" wire:model="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-w-full" wire:loading.attr="disabled">
                    <span wire:loading.remove>Continue</span>
                    <span wire:loading>Checking...</span>
                </button>
            </form>
        @endif

        <!-- Step 2: Preferences -->
        @if ($step === 2)
            <form wire:submit="nextStep" class="space-y-5" style="margin-top:2rem;">
                <x-address-input wire-raw-address="rawAddress" wire-place-id="placeId" label="Your address" />
                <x-input-error :messages="$errors->get('rawAddress')" class="mt-2" />

                <div>
                    <label class="form-label">What type of work interests you?</label>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;margin-top:0.75rem;">
                        @foreach (ProfileOptions::INDUSTRIES_AND_WORK_TYPES as $opt)
                            <label class="option-label"><input type="checkbox" class="form-checkbox" wire:model="workTypes" value="{{ $opt['value'] }}" /><span>{{ $opt['label'] }}</span></label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="form-label">When are you typically available?</label>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;margin-top:0.75rem;">
                        @foreach (ProfileOptions::AVAILABILITIES as $opt)
                            <label class="option-label"><input type="checkbox" class="form-checkbox" wire:model="availability" value="{{ $opt['value'] }}" /><span>{{ $opt['label'] }}</span></label>
                        @endforeach
                    </div>
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

        <!-- Step 3: Terms -->
        @if ($step === 3)
            <form wire:submit="register" class="space-y-5" style="margin-top:2rem;">
                <div class="alert-accent">
                    <h3>Almost there!</h3>
                    <p>Review and agree to our terms to start receiving job offers.</p>
                </div>

                <div class="space-y-4">
                    <label class="checkbox-label">
                        <input type="checkbox" class="form-checkbox" wire:model="agreeTerms" />
                        <span>
                            I agree to the
                            <a href="#">Terms of Service</a>
                            and
                            <a href="#">Privacy Policy</a>
                        </span>
                    </label>
                    <x-input-error :messages="$errors->get('agreeTerms')" class="mt-1" />

                    <label class="checkbox-label">
                        <input type="checkbox" class="form-checkbox" wire:model="agreeSms" />
                        <span>
                            I consent to receive job offers and updates via SMS. Message &amp; data rates may apply. Reply STOP to opt out anytime.
                        </span>
                    </label>
                    <x-input-error :messages="$errors->get('agreeSms')" class="mt-1" />

                    <label class="checkbox-label">
                        <input type="checkbox" class="form-checkbox" wire:model="confirmAge" />
                        <span>
                            I confirm I am at least 18 years old and legally authorized to work in the United States.
                        </span>
                    </label>
                    <x-input-error :messages="$errors->get('confirmAge')" class="mt-1" />
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
    @endif

    <p class="text-sm text-muted" style="text-align:center;margin-top:2rem;">
        Already have an account?
        <a href="{{ route('login') }}" class="auth-footer-link" wire:navigate>Sign in</a>
    </p>

</div>
