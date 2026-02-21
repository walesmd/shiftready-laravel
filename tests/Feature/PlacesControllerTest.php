<?php

use App\Data\PlaceAutocompleteResult;
use App\Services\GoogleMapsService;
use Mockery\MockInterface;

test('autocomplete endpoint validates minimum input length', function () {
    $this->getJson('/api/places/autocomplete?input=ab&session_token=abc')
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['input']);
});

test('autocomplete endpoint requires session_token', function () {
    $this->getJson('/api/places/autocomplete?input=123+Main')
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['session_token']);
});

test('autocomplete endpoint proxies service results correctly', function () {
    $this->mock(GoogleMapsService::class, function (MockInterface $mock) {
        $mock->shouldReceive('autocomplete')
            ->once()
            ->with('123 Main', 'my-session-token')
            ->andReturn([
                new PlaceAutocompleteResult('place-1', '123 Main St, San Antonio, TX'),
                new PlaceAutocompleteResult('place-2', '123 Main Ave, Austin, TX'),
            ]);
    });

    $this->getJson('/api/places/autocomplete?input=123+Main&session_token=my-session-token')
        ->assertOk()
        ->assertJson([
            'predictions' => [
                ['place_id' => 'place-1', 'description' => '123 Main St, San Antonio, TX'],
                ['place_id' => 'place-2', 'description' => '123 Main Ave, Austin, TX'],
            ],
        ]);
});

test('autocomplete endpoint returns empty predictions when service returns none', function () {
    $this->mock(GoogleMapsService::class, function (MockInterface $mock) {
        $mock->shouldReceive('autocomplete')
            ->once()
            ->andReturn([]);
    });

    $this->getJson('/api/places/autocomplete?input=xyzzy+nowhere&session_token=abc')
        ->assertOk()
        ->assertJson(['predictions' => []]);
});
