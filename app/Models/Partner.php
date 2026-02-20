<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Partner extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn () => Cache::forget('nav_partners'));
        static::deleted(fn () => Cache::forget('nav_partners'));
    }

    public function products(): HasMany 
    {
        return $this->hasMany(Product::class);
    }
}
