<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function rules()
    {
        return $this->belongsToMany(Rule::class); // for ex. a user and an admin have a permission to create a post
    }
}
