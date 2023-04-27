<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Category,
    Comment,
    Post,
    User
};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index')
            ->with('posts_count', Post::count())
            ->with('users_count', User::count())
            ->with('categories_count', Category::count())
            ->with('comments_count', Comment::count());
    }
}
