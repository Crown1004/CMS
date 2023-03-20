<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id'); // where the parent_id = null witch means that is the main comment else it is a reply
    }

    // function name is Approved scope is to use model scope
    public function scopeApproved($query)
    {
        return $query->whereApproved(1)->latest(); // return only approved posts
    }
}
