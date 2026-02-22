<?php

namespace Tests\Feature\Auth;

use App\Enums\Feature;
use App\Enums\UserType;
use App\Jobs\GeocodeAddressJob;
use App\Models\FeatureFlag;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Queue;
use Livewire\Volt\Volt;

beforeEach(function () {
    Cache::flush();
});

test('worker registration screen can be rendered', function () {
    $this->get('/signup/worker')->assertOk()->assertSeeVolt('pages.auth.register-worker');
});

test('employer registration screen can be rendered', function () {
    $this->get('/signup/employer')->assertOk()->assertSeeVolt('pages.auth.register-employer');
});

test('new workers can register', function () {
    Queue::fake();

    Volt::test('pages.auth.register-worker')
        ->set('firstName', 'Test')
        ->set('lastName', 'Worker')
        ->set('phone', '2105550123')
        ->set('email', 'worker@example.com')
        ->set('password', 'password')
        ->call('nextStep')
        ->set('rawAddress', '123 Main St, San Antonio, TX 78201')
        ->set('placeId', 'test-place-id')
        ->call('nextStep')
        ->set('agreeTerms', true)
        ->set('agreeSms', true)
        ->set('confirmAge', true)
        ->call('register')
        ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();

    $user = User::where('email', 'worker@example.com')->firstOrFail();

    expect($user->user_type)->toBe(UserType::Worker)
        ->and($user->workerProfile)->not->toBeNull()
        ->and($user->workerProfile->phone)->toBe('2105550123')
        ->and($user->workerProfile->address_id)->not->toBeNull()
        ->and($user->workerProfile->address->raw_address)->toBe('123 Main St, San Antonio, TX 78201')
        ->and($user->workerProfile->address->place_id)->toBe('test-place-id');

    Queue::assertPushed(GeocodeAddressJob::class);
});

test('new employers can register', function () {
    Queue::fake();

    Volt::test('pages.auth.register-employer')
        ->set('companyName', 'Acme Corp')
        ->set('firstName', 'Test')
        ->set('lastName', 'Employer')
        ->set('title', 'Manager')
        ->set('email', 'employer@example.com')
        ->set('phone', '2105550456')
        ->set('password', 'password')
        ->call('nextStep')
        ->set('industry', 'moving')
        ->set('rawAddress', '456 Oak Ave, San Antonio, TX 78205')
        ->set('placeId', 'employer-place-id')
        ->set('workerCount', '1-5')
        ->call('nextStep')
        ->set('agreeTerms', true)
        ->set('agreeAuthorization', true)
        ->call('register')
        ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();

    $user = User::where('email', 'employer@example.com')->firstOrFail();

    expect($user->user_type)->toBe(UserType::Employer)
        ->and($user->employerProfile)->not->toBeNull()
        ->and($user->employerProfile->company_name)->toBe('Acme Corp')
        ->and($user->employerProfile->industry)->toBe('moving')
        ->and($user->employerProfile->address_id)->not->toBeNull()
        ->and($user->employerProfile->address->raw_address)->toBe('456 Oak Ave, San Antonio, TX 78205')
        ->and($user->employerProfile->address->place_id)->toBe('employer-place-id');

    Queue::assertPushed(GeocodeAddressJob::class);
});

test('worker registration form replaced when disable_signup is enabled', function () {
    FeatureFlag::factory()->enabled()->forFeature(Feature::DisableSignup)->create();

    Volt::test('pages.auth.register-worker')
        ->assertSee("We'll be in touch soon", false)
        ->assertDontSee('Start earning today');
});

test('employer registration form replaced when disable_signup is enabled', function () {
    FeatureFlag::factory()->enabled()->forFeature(Feature::DisableSignup)->create();

    Volt::test('pages.auth.register-employer')
        ->assertSee("We'll be in touch soon", false)
        ->assertDontSee('Get started for your business');
});
