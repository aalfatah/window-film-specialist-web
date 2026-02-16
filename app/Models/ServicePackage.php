<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    protected $fillable = [
        'service_id', 
        'name', 
        'description', 
        'price_label', 
        'features'
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
