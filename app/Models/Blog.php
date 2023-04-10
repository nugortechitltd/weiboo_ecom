<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    function rel_to_tag() {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
    function rel_to_user() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
