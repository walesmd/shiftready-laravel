<?php

namespace App\Models\Concerns;

use App\Jobs\GeocodeAddressJob;
use App\Models\Address;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAddress
{
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function isGeolocated(): bool
    {
        return $this->address !== null && $this->address->isGeocoded();
    }

    public function setAddress(string $rawAddress, ?string $placeId = null): void
    {
        if ($placeId !== null) {
            $address = Address::firstOrCreate(
                ['place_id' => $placeId],
                ['raw_address' => $rawAddress],
            );
        } else {
            $address = Address::firstOrCreate(['raw_address' => $rawAddress]);
        }

        $this->withoutEvents(fn () => $this->update(['address_id' => $address->id]));

        if (! $address->isGeocoded()) {
            GeocodeAddressJob::dispatch($address);
        }
    }
}
