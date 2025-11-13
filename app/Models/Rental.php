<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'car_id',
        'name',
        'email',
        'phone',
        'pickup_date',
        'return_date',
        'total_price',
    ];

    protected $casts = [
        'total_price' => 'integer',
        'pickup_date' => 'datetime',
        'return_date' => 'datetime',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
