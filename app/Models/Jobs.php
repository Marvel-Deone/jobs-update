<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_desc',
        'job_req',
        'job_type',
        'job_location',
        'link',
        'users_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'user_id');
    }
}
