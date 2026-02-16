<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'subtitle',
        'image',
        'description',
        'service_type',
        'price',
        'icon',
        'is_featured',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function packages() {
        return $this->hasMany(ServicePackage::class);
    }

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }

}
