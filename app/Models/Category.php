<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function booted()
    {
        static::saved(fn () => Cache::forget('nav_categories'));
        static::deleted(fn () => Cache::forget('nav_categories'));
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
