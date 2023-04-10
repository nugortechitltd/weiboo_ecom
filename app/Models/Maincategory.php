<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maincategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_user() {
        return $this->belongsTo(User::class, 'added_by');
    }

    function rel_to_product() {
        return $this->hashMany(Product::class, 'maincategory_id');
    }
    
}
