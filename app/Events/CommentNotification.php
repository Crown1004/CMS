<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $post;
    public $post_title;
    public $user_name;
    public $user_image;
    public $date;

    public function __construct($data = [])
    {
        $this->post = $data['post'];
        $this->post_title = $data['post_title'];
        $this->user_name = $data['user_name'];
        $this->user_image = $data['user_image'];
        $this->date = Carbon::now()->diffForHumans();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('real-notification.'  . $this->post->user_id), // PrivateChannel i control who can view the channel
        ];
    }
}
