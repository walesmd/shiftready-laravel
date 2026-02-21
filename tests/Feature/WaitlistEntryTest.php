<?php

use App\Models\WaitlistEntry;
use Livewire\Volt\Volt;

test('valid email is saved and shows success state', function () {
    $component = Volt::test('home.waitlist-form')
        ->set('email', 'test@example.com')
        ->call('submit');

    $component
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    $this->assertDatabaseHas('waitlist_entries', ['email' => 'test@example.com']);
});

test('duplicate email uses firstOrCreate and still shows success', function () {
    WaitlistEntry::create(['email' => 'existing@example.com']);

    $component = Volt::test('home.waitlist-form')
        ->set('email', 'existing@example.com')
        ->call('submit');

    $component
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    $this->assertDatabaseCount('waitlist_entries', 1);
});

test('invalid email shows validation error and form stays visible', function () {
    $component = Volt::test('home.waitlist-form')
        ->set('email', 'not-an-email')
        ->call('submit');

    $component
        ->assertHasErrors(['email'])
        ->assertSet('submitted', false);

    $this->assertDatabaseCount('waitlist_entries', 0);
});
