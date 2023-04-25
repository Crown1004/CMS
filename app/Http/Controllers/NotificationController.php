<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $all_notifications = Notification::where([
            ['user_id', '!=', auth()->user()->id], // dont show the notifications of the current user
            ['post_userId', '=', auth()->user()->id], // show the notifications of the current user
        ])->orderBy('created_at', 'desc')->limit(4)->get();

        $data = []; // to send to ajax

        foreach ($all_notifications as $notification) {
            $data[] = [
                'user_name' => $notification->user->name,
                'user_image' => $notification->user->image,
                'post_title' => $notification->post->title,
                'post_slug' => $notification->post->slug,
                'date' => $notification->created_at->diffForHumans(),
            ];
        }

        return response()->json(['all_notifications' => $data]);
    }
}
