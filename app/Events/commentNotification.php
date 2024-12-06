<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class commentNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $post_title;
    public $post;
    public $user_name;
    public $user_image;
    public $date;

    public function __construct($data = [])
    {
        $this->post_title = $data['post_title'];
        $this->post = $data['post'];
        $this->user_name = $data['user_name'];
        $this->user_image = $data['user_image'];
        $this->date = now()->diffForHumans();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {

    return new PrivateChannel("real-notification.{$this->post->user_id}");
        // return [
        //     new PrivateChannel('real-notification.'.$this->post->user_id),
        // ];
    }
}
