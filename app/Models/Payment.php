<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rental_id',
        'total_amount',
        'status',
        'proof',
    ];

    protected $casts = [
        'total_amount' => 'integer',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
