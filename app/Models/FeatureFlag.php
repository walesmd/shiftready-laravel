<?php

namespace App\Models;

use App\Services\FeatureFlagService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureFlag extends Model
{
    /** @use HasFactory<\Database\Factories\FeatureFlagFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = ['name', 'is_enabled'];

    public function casts(): array
    {
        return [
            'is_enabled' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        $flush = fn () => app(FeatureFlagService::class)->flush();

        static::saved($flush);
        static::deleted($flush);
    }
}
