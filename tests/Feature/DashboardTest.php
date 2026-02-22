<?php

use App\Models\User;

test('employer user sees company name and employer nav on dashboard', function () {
    $user = User::factory()->employer()->create();

    $this->actingAs($user);

    $response = $this->get(route('dashboard'));

    $response->assertOk();
    $response->assertSee($user->employerProfile->company_name);
    $response->assertSee('Overview');
    $response->assertSee('Shifts');
    $response->assertSee('Workers');
});

test('worker user sees their name and worker nav on dashboard', function () {
    $user = User::factory()->worker()->create();

    $this->actingAs($user);

    $response = $this->get(route('dashboard'));

    $response->assertOk();
    $response->assertSee($user->name);
    $response->assertSee('Overview');
    $response->assertSee('Settings');
    $response->assertDontSee('Workers');
    $response->assertDontSee('Shifts');
});

test('unauthenticated user is redirected to login from dashboard', function () {
    $response = $this->get(route('dashboard'));

    $response->assertRedirect(route('login'));
});
