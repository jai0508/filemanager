<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class PostLikeNotification extends Notification implements ShouldBroadcast
{
    use Queueable;
    protected $post;
    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post , User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database' , 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'post_id' => $this->post->id,
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'post_title' => $this->post->title,
        ];
    }

    public function toBroadcast(object $notifiable)
    {
        $notification= [
            'data' => [
                'user_name' => $this->user->name,
                'post_title' => $this->post->title,
            ]
        ];
        return new BroadcastMessage([
         'notification' => $notification,
        ]);
    }
}
