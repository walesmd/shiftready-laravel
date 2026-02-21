<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'place_id',
        'raw_address',
        'formatted_address',
        'lat',
        'lng',
        'geocoded_at',
    ];

    protected function casts(): array
    {
        return [
            'geocoded_at' => 'datetime',
        ];
    }

    public function isGeocoded(): bool
    {
        return $this->geocoded_at !== null;
    }

    public function displayAddress(): string
    {
        return $this->formatted_address ?? $this->raw_address;
    }
}
