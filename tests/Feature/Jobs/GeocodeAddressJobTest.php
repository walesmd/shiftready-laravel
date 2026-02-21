<?php

use App\Data\PlaceDetails;
use App\Jobs\GeocodeAddressJob;
use App\Models\Address;
use App\Services\GoogleMapsService;
use Mockery\MockInterface;

test('job updates address with geocoded data on success', function () {
    $address = Address::factory()->create([
        'place_id' => 'test-place-id',
        'raw_address' => '123 Main St, San Antonio, TX',
    ]);

    $details = new PlaceDetails(
        placeId: 'test-place-id',
        formattedAddress: '123 Main St, San Antonio, TX 78201, USA',
        lat: 29.4241,
        lng: -98.4936,
    );

    $mock = $this->mock(GoogleMapsService::class, function (MockInterface $mock) use ($details) {
        $mock->shouldReceive('placeDetails')
            ->once()
            ->andReturn($details);
    });

    (new GeocodeAddressJob($address))->handle($mock);

    $address->refresh();

    expect($address->formatted_address)->toBe('123 Main St, San Antonio, TX 78201, USA')
        ->and((float) $address->lat)->toBe(29.4241)
        ->and((float) $address->lng)->toBe(-98.4936)
        ->and($address->geocoded_at)->not->toBeNull();
});

test('job skips already geocoded address', function () {
    $address = Address::factory()->geocoded()->create();

    $mock = $this->mock(GoogleMapsService::class, function (MockInterface $mock) {
        $mock->shouldNotReceive('placeDetails');
        $mock->shouldNotReceive('geocode');
    });

    (new GeocodeAddressJob($address))->handle($mock);
});

test('job uses geocode when no place_id is set', function () {
    $address = Address::factory()->create([
        'place_id' => null,
        'raw_address' => '123 Main St, San Antonio, TX',
    ]);

    $details = new PlaceDetails(
        placeId: '',
        formattedAddress: '123 Main St, San Antonio, TX 78201, USA',
        lat: 29.4241,
        lng: -98.4936,
    );

    $mock = $this->mock(GoogleMapsService::class, function (MockInterface $mock) use ($details) {
        $mock->shouldReceive('geocode')
            ->once()
            ->andReturn($details);
    });

    (new GeocodeAddressJob($address))->handle($mock);

    $address->refresh();

    expect($address->geocoded_at)->not->toBeNull();
});

test('job leaves fields null when API returns no details', function () {
    $address = Address::factory()->create([
        'place_id' => 'test-place-id',
        'raw_address' => '123 Main St',
    ]);

    $mock = $this->mock(GoogleMapsService::class, function (MockInterface $mock) {
        $mock->shouldReceive('placeDetails')
            ->once()
            ->andReturn(null);
    });

    (new GeocodeAddressJob($address))->handle($mock);

    $address->refresh();

    expect($address->formatted_address)->toBeNull()
        ->and($address->lat)->toBeNull()
        ->and($address->geocoded_at)->toBeNull();
});
