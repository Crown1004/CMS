<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name'];

    use HasFactory;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class); // for ex. a user and an admin have a permission to create a post
    }
}
