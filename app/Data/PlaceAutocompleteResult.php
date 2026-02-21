<?php

namespace App\Data;

readonly class PlaceAutocompleteResult
{
    public function __construct(
        public string $placeId,
        public string $description,
    ) {}
}
