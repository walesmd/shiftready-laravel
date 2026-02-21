<?php

namespace App\Models;

use App\Models\Concerns\HasAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkerProfile extends Model
{
    use HasAddress;

    /** @use HasFactory<\Database\Factories\WorkerProfileFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'phone',
        'address_id',
        'work_types',
        'availability',
    ];

    protected function casts(): array
    {
        return [
            'work_types' => 'array',
            'availability' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
