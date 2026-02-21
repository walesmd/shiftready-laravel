<?php

namespace App\Data;

readonly class PlaceDetails
{
    public function __construct(
        public string $placeId,
        public string $formattedAddress,
        public float $lat,
        public float $lng,
    ) {}

    /**
     * Parse a Google Places Details or Geocoding API response.
     *
     * @param  array<string, mixed>  $data
     */
    public static function fromGoogleResponse(string $placeId, array $data): ?self
    {
        // Places Details API shape
        if (isset($data['result'])) {
            $result = $data['result'];

            return new self(
                placeId: $placeId,
                formattedAddress: $result['formatted_address'] ?? '',
                lat: $result['geometry']['location']['lat'] ?? 0,
                lng: $result['geometry']['location']['lng'] ?? 0,
            );
        }

        // Geocoding API shape
        if (isset($data['results'][0])) {
            $result = $data['results'][0];

            return new self(
                placeId: $result['place_id'] ?? $placeId,
                formattedAddress: $result['formatted_address'] ?? '',
                lat: $result['geometry']['location']['lat'] ?? 0,
                lng: $result['geometry']['location']['lng'] ?? 0,
            );
        }

        return null;
    }
}
