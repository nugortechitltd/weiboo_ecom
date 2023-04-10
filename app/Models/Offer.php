<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_coupon() {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
}
