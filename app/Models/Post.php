<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug',
        'body',
        'approved',
        'category_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id'); // where the parent_id = null witch means that is the main comment else it is a reply
    }

    // function name is Approved scope is to use model scope
    public function scopeApproved($query)
    {
        return $query->whereApproved(1)->latest(); // return only approved posts
    }

    // automatically called when the title is changed
    protected function title(): Attribute // automatically create a slug using the title as an attribute
    {
        return Attribute::make(
            set: fn (string $value) => [
                'title' => $value,
                'slug' => Slug::uniqueSlug($value, 'posts'),
            ],
        );
    }
}
