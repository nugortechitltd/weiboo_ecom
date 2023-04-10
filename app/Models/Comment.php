<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    function rel_to_user() {
        return $this->belongsTo(Customerauth::class, 'user_id');
    }

    function replies() {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}
