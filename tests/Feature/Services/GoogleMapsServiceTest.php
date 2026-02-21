<?php

use App\Data\PlaceAutocompleteResult;
use App\Data\PlaceDetails;
use App\Services\GoogleMapsService;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    $this->service = new GoogleMapsService('test-api-key');
});

// --- autocomplete ---

test('autocomplete returns predictions on success', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/place/autocomplete/*' => Http::response([
            'status' => 'OK',
            'predictions' => [
                ['place_id' => 'abc123', 'description' => '123 Main St, San Antonio, TX'],
                ['place_id' => 'def456', 'description' => '456 Oak Ave, Austin, TX'],
            ],
        ]),
    ]);

    $results = $this->service->autocomplete('123 Main', 'session-token');

    expect($results)->toHaveCount(2)
        ->and($results[0])->toBeInstanceOf(PlaceAutocompleteResult::class)
        ->and($results[0]->placeId)->toBe('abc123')
        ->and($results[0]->description)->toBe('123 Main St, San Antonio, TX');
});

test('autocomplete returns empty array on ZERO_RESULTS', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/place/autocomplete/*' => Http::response([
            'status' => 'ZERO_RESULTS',
            'predictions' => [],
        ]),
    ]);

    $results = $this->service->autocomplete('xyzzy', 'session-token');

    expect($results)->toBeEmpty();
});

test('autocomplete returns empty array on API error status', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/place/autocomplete/*' => Http::response([
            'status' => 'REQUEST_DENIED',
            'error_message' => 'Invalid key',
        ]),
    ]);

    $results = $this->service->autocomplete('123 Main', 'session-token');

    expect($results)->toBeEmpty();
});

// --- placeDetails ---

test('placeDetails returns parsed details on success', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/place/details/*' => Http::response([
            'status' => 'OK',
            'result' => [
                'formatted_address' => '123 Main St, San Antonio, TX 78201',
                'geometry' => ['location' => ['lat' => 29.4241, 'lng' => -98.4936]],
            ],
        ]),
    ]);

    $details = $this->service->placeDetails('abc123', 'session-token');

    expect($details)->toBeInstanceOf(PlaceDetails::class)
        ->and($details->placeId)->toBe('abc123')
        ->and($details->formattedAddress)->toBe('123 Main St, San Antonio, TX 78201')
        ->and($details->lat)->toBe(29.4241)
        ->and($details->lng)->toBe(-98.4936);
});

test('placeDetails returns null on HTTP 404', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/place/details/*' => Http::response([], 404),
    ]);

    $details = $this->service->placeDetails('missing', 'session-token');

    expect($details)->toBeNull();
});

test('placeDetails returns null on non-OK Google status', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/place/details/*' => Http::response([
            'status' => 'NOT_FOUND',
        ]),
    ]);

    $details = $this->service->placeDetails('bad-id', 'session-token');

    expect($details)->toBeNull();
});

// --- geocode ---

test('geocode returns parsed details on success', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/geocode/*' => Http::response([
            'status' => 'OK',
            'results' => [
                [
                    'place_id' => 'geocoded-place-id',
                    'formatted_address' => '123 Main St, San Antonio, TX 78201, USA',
                    'geometry' => ['location' => ['lat' => 29.4241, 'lng' => -98.4936]],
                ],
            ],
        ]),
    ]);

    $details = $this->service->geocode('123 Main St San Antonio TX');

    expect($details)->toBeInstanceOf(PlaceDetails::class)
        ->and($details->formattedAddress)->toBe('123 Main St, San Antonio, TX 78201, USA')
        ->and($details->lat)->toBe(29.4241);
});

test('geocode returns null on no results', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/geocode/*' => Http::response([
            'status' => 'ZERO_RESULTS',
            'results' => [],
        ]),
    ]);

    $details = $this->service->geocode('zzz nowhere land');

    expect($details)->toBeNull();
});

test('geocode returns null on non-OK HTTP response', function () {
    Http::fake([
        'maps.googleapis.com/maps/api/geocode/*' => Http::response([], 500),
    ]);

    $details = $this->service->geocode('123 Main St');

    expect($details)->toBeNull();
});
