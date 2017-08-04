<?php

namespace App\Events;

use App\Entities\Article;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArticleCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $article, $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->article = Article::all()->last();
        $this->user = User::where('send_email_state',1)->get();;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
