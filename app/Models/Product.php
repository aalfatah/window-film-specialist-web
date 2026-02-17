<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function getMaxSpec($key)
    {
        if (empty($this->specifications)) return null;

        return collect($this->specifications)->max($key);
    }

    /**
     * Accessor untuk Max VLT
     */
    protected function maxVlt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getMaxSpec('vlt'),
        );
    }

    /**
     * Accessor untuk Max IRR
     */
    protected function maxIrr(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getMaxSpec('irr'),
        );
    }

    /**
     * Accessor untuk Max TSER
     */
    protected function maxTser(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getMaxSpec('tser'),
        );
    }
}