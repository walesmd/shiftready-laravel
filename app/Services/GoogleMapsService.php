<?php

namespace App\Services;

use App\Data\PlaceAutocompleteResult;
use App\Data\PlaceDetails;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleMapsService
{
    private const string AUTOCOMPLETE_URL = 'https://maps.googleapis.com/maps/api/place/autocomplete/json';

    private const string PLACE_DETAILS_URL = 'https://maps.googleapis.com/maps/api/place/details/json';

    private const string GEOCODE_URL = 'https://maps.googleapis.com/maps/api/geocode/json';

    public function __construct(public readonly string $apiKey) {}

    /**
     * @return PlaceAutocompleteResult[]
     */
    public function autocomplete(string $input, string $sessionToken): array
    {
        $response = Http::timeout(15)->get(self::AUTOCOMPLETE_URL, [
            'input' => $input,
            'sessiontoken' => $sessionToken,
            'key' => $this->apiKey,
        ]);

        if (! $response->ok()) {
            Log::warning('Google Places Autocomplete HTTP error', ['status' => $response->status()]);

            return [];
        }

        $data = $response->json();

        if (! is_array($data)) {
            Log::warning('Google Places Autocomplete invalid JSON response');

            return [];
        }

        if (($data['status'] ?? '') !== 'OK') {
            if (($data['status'] ?? '') !== 'ZERO_RESULTS') {
                Log::warning('Google Places Autocomplete non-OK status', ['status' => $data['status'] ?? 'unknown']);
            }

            return [];
        }

        return array_map(
            fn (array $prediction) => new PlaceAutocompleteResult(
                placeId: $prediction['place_id'],
                description: $prediction['description'],
            ),
            $data['predictions'] ?? [],
        );
    }

    public function placeDetails(string $placeId, string $sessionToken): ?PlaceDetails
    {
        $response = Http::get(self::PLACE_DETAILS_URL, [
            'place_id' => $placeId,
            'fields' => 'formatted_address,geometry',
            'sessiontoken' => $sessionToken,
            'key' => $this->apiKey,
        ]);

        if (! $response->ok()) {
            Log::warning('Google Places Details HTTP error', ['status' => $response->status()]);

            return null;
        }

        $data = $response->json();

        if (($data['status'] ?? '') !== 'OK') {
            Log::warning('Google Places Details non-OK status', ['status' => $data['status'] ?? 'unknown']);

            return null;
        }

        return PlaceDetails::fromGoogleResponse($placeId, $data);
    }

    public function geocode(string $rawAddress): ?PlaceDetails
    {
        $response = Http::get(self::GEOCODE_URL, [
            'address' => $rawAddress,
            'key' => $this->apiKey,
        ]);

        if (! $response->ok()) {
            Log::warning('Google Geocoding HTTP error', ['status' => $response->status()]);

            return null;
        }

        $data = $response->json();

        if (($data['status'] ?? '') !== 'OK') {
            if (($data['status'] ?? '') !== 'ZERO_RESULTS') {
                Log::warning('Google Geocoding non-OK status', ['status' => $data['status'] ?? 'unknown']);
            }

            return null;
        }

        return PlaceDetails::fromGoogleResponse('', $data);
    }
}
