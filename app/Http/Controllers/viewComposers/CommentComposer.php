<?php

namespace App\Http\Controllers\viewComposers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\View\View;

class CommentComposer extends Controller
{
    protected $comments;

    public  function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }

    public function compose(View $view) // executed automaticly
    {
        return $view->with('recent_comments', $this->comments::with('user', 'post:id')->take(8)->latest()->get()); // send latest 8 comments and send it to partials.sidebar as defined in AppServiceProvider with a variable named recent_comments
    }
}
