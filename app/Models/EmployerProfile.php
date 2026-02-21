<?php

namespace App\Models;

use App\Models\Concerns\HasAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployerProfile extends Model
{
    use HasAddress;

    /** @use HasFactory<\Database\Factories\EmployerProfileFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'company_name',
        'title',
        'phone',
        'industry',
        'address_id',
        'worker_count',
        'roles',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
