<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'brand_id',
        'name',
        'slug',
        'plate',
        'transmission',
        'fuel_type',
        'seats',
        'price_per_day',
        'thumbnail',
        'status',
    ];

    protected $casts = [
        'price_per_day' => 'integer',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
