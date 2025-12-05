<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'status',
        'order',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('order', function ($builder) {
            $builder->orderBy('order', 'asc');
        });
    }
}
