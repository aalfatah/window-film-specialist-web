<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profession',
        'content',
        'avatar',
        'rating',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
