<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCreateEvent
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  /**
   * Create a new event instance.
   */
  public function __construct(public $post)
  {
  }

  public function broadcastOn(): Channel
  {
    return new Channel('posts');
  }

  public function broadCastAs(): string
  {
    return 'create';
  }

  public function broadCastWith(): array
  {
    return [
      'message' => "[{$this->post->created_at}]  New Post Received with title '{$this->post->title}'.",
    ];
  }
}
