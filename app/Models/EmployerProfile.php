<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployerProfile extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerProfileFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'company_name',
        'title',
        'phone',
        'industry',
        'address',
        'city',
        'zip_code',
        'worker_count',
        'roles',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
