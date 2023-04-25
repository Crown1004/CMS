<?php

namespace App\Http\Controllers;

use App\Events\CommentNotification;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = $this->comment;
        $comment->body = $request->get('body');
        $comment->post_id = $request->get('post_id'); // send from the hidden input
        $comment->user()->associate($request->user()); // to link the comment with the user using associate as i used morph many relation
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($comment);

        // save notifications in database
        $notification = new Notification();
        if ($request->user()->id != $post->user_id) { // dont send notification to the user when he comment on his post
            $notification->user_id = $request->user()->id; // from
            $notification->post_id = $post->id;
            $notification->post_userId = $post->user_id; // to
            $notification->save();
        }

        // when the user comment on a post store() will be executed create this event and send this data to it
        $data = [
            'post' => $post,
            'post_title' => $post->title,
            'user_name' => $request->user()->name,
            'user_image' => $request->user()->profile_photo_url,
        ];
        event(new CommentNotification($data));


        return back()->with('success', 'تم إضافة التعليق بنجاح');
    }

    public function replyStore(Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required',
        ]);

        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->post_id = $request->get('post_id');
        $reply->parent_id = $request->get('comment_id'); // comment id that i replied on
        $reply->user()->associate($request->user()); // to link the reply with the user using associate as i used morph many relation
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back()->with('success', 'تم إضافة الرد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
