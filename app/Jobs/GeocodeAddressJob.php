<?php

namespace App\Jobs;

use App\Models\Address;
use App\Services\GoogleMapsService;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GeocodeAddressJob implements ShouldBeUnique, ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public int $backoff = 30;

    public function __construct(public readonly Address $address) {}

    public function uniqueId(): int
    {
        return $this->address->id;
    }

    public function handle(GoogleMapsService $service): void
    {
        if ($this->address->isGeocoded()) {
            return;
        }

        $details = $this->address->place_id
            ? $service->placeDetails($this->address->place_id, Str::uuid()->toString())
            : $service->geocode($this->address->raw_address);

        if ($details === null) {
            Log::warning('GeocodeAddressJob: no details returned', ['address_id' => $this->address->id]);

            return;
        }

        $this->address->update([
            'formatted_address' => $details->formattedAddress,
            'lat' => $details->lat,
            'lng' => $details->lng,
            'geocoded_at' => now(),
        ]);
    }
}
