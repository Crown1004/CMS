<?php

namespace App\Http\Controllers\viewComposers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryComposer extends Controller
{
    protected $categories;
    protected $posts_number; // count the number of posts in all the category

    public function __construct(Category $categories, Post $posts_number)
    {
        $this->categories = $categories;
        $this->posts_number = $posts_number;
    }


    public function compose(View $view) // executed automaticly
    {
        $view->with('categories', $this->categories->all())->with('posts_number', $this->posts_number->whereApproved(1)->count()); // send categories to the passed view partials.sidebar in the AppServiceProvider.php
    }
}
