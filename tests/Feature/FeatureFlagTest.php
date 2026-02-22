<?php

use App\Enums\Feature;
use App\Models\FeatureFlag;
use App\Services\FeatureFlagService;
use Illuminate\Support\Facades\Cache;
use Livewire\Volt\Volt;

beforeEach(function () {
    Cache::flush();
});

test('unknown flags default to disabled', function () {
    $service = app(FeatureFlagService::class);

    expect($service->isEnabled('nonexistent_flag'))->toBeFalse();
});

test('service returns false when flag is disabled in db', function () {
    FeatureFlag::factory()->disabled()->forFeature(Feature::DisableSignup)->create();

    expect(app(FeatureFlagService::class)->isEnabled('disable_signup'))->toBeFalse();
});

test('service returns true when flag is enabled in db', function () {
    FeatureFlag::factory()->enabled()->forFeature(Feature::DisableSignup)->create();

    expect(app(FeatureFlagService::class)->isEnabled('disable_signup'))->toBeTrue();
});

test('feature enum isEnabled delegates to service', function () {
    FeatureFlag::factory()->enabled()->forFeature(Feature::DisableSignup)->create();

    expect(Feature::DisableSignup->isEnabled())->toBeTrue();
    expect(Feature::DisableSignup->isDisabled())->toBeFalse();
});

test('service caches flag results', function () {
    FeatureFlag::factory()->disabled()->forFeature(Feature::DisableSignup)->create();

    $service = app(FeatureFlagService::class);
    $service->isEnabled('disable_signup');

    // Update DB directly — cache should still return old value
    FeatureFlag::where('name', 'disable_signup')->update(['is_enabled' => true]);

    expect($service->isEnabled('disable_signup'))->toBeFalse();
});

test('saving a flag flushes the cache', function () {
    $flag = FeatureFlag::factory()->disabled()->forFeature(Feature::DisableSignup)->create();

    $service = app(FeatureFlagService::class);
    $service->isEnabled('disable_signup'); // warm cache

    $flag->update(['is_enabled' => true]);

    expect($service->isEnabled('disable_signup'))->toBeTrue();
});

test('deleting a flag flushes the cache', function () {
    $flag = FeatureFlag::factory()->enabled()->forFeature(Feature::DisableSignup)->create();

    $service = app(FeatureFlagService::class);
    $service->isEnabled('disable_signup'); // warm cache

    $flag->delete();

    expect($service->isEnabled('disable_signup'))->toBeFalse();
});

test('disable_signup flag hides worker registration form', function () {
    FeatureFlag::factory()->enabled()->forFeature(Feature::DisableSignup)->create();

    Volt::test('pages.auth.register-worker')
        ->assertSee("We'll be in touch soon", false)
        ->assertDontSee('Start earning today');
});

test('disable_signup flag hides employer registration form', function () {
    FeatureFlag::factory()->enabled()->forFeature(Feature::DisableSignup)->create();

    Volt::test('pages.auth.register-employer')
        ->assertSee("We'll be in touch soon", false)
        ->assertDontSee('Get started for your business');
});

test('worker registration form visible when disable_signup is off', function () {
    FeatureFlag::factory()->disabled()->forFeature(Feature::DisableSignup)->create();

    Volt::test('pages.auth.register-worker')
        ->assertSee('Start earning today')
        ->assertDontSee("We'll be in touch soon", false);
});

test('employer registration form visible when disable_signup is off', function () {
    FeatureFlag::factory()->disabled()->forFeature(Feature::DisableSignup)->create();

    Volt::test('pages.auth.register-employer')
        ->assertSee('Get started for your business')
        ->assertDontSee("We'll be in touch soon", false);
});
