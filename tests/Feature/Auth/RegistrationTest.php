<?php

namespace Tests\Feature\Auth;

use App\Enums\UserType;
use App\Models\User;
use Livewire\Volt\Volt;

test('worker registration screen can be rendered', function () {
    $this->get('/signup/worker')->assertOk()->assertSeeVolt('pages.auth.register-worker');
});

test('employer registration screen can be rendered', function () {
    $this->get('/signup/employer')->assertOk()->assertSeeVolt('pages.auth.register-employer');
});

test('new workers can register', function () {
    Volt::test('pages.auth.register-worker')
        ->set('firstName', 'Test')
        ->set('lastName', 'Worker')
        ->set('phone', '2105550123')
        ->set('email', 'worker@example.com')
        ->set('password', 'password')
        ->call('nextStep')
        ->set('zip', '78201')
        ->call('nextStep')
        ->set('agreeTerms', true)
        ->set('agreeSms', true)
        ->set('confirmAge', true)
        ->call('register')
        ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();

    $user = User::where('email', 'worker@example.com')->first();

    expect($user->user_type)->toBe(UserType::Worker)
        ->and($user->workerProfile)->not->toBeNull()
        ->and($user->workerProfile->phone)->toBe('2105550123')
        ->and($user->workerProfile->zip_code)->toBe('78201');
});

test('new employers can register', function () {
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
        ->set('address', '123 Main St')
        ->set('city', 'San Antonio')
        ->set('zip', '78201')
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
        ->and($user->employerProfile->address)->toBe('123 Main St')
        ->and($user->employerProfile->city)->toBe('San Antonio')
        ->and($user->employerProfile->zip_code)->toBe('78201');
});
