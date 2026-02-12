<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
        'specifications' => 'array', // agar JSON otomatis jadi Array
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}