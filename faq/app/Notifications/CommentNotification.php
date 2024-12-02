<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $comment;
    protected $post;
    public function __construct($comment, $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        \Illuminate\Support\Facades\Log::info('toMail method triggered for: ' . $notifiable->email);

        return (new MailMessage)
            ->subject('New Comment on Your Post')
            ->greeting('Hello ' . $this->post->user->name . ',')
            ->line('Someone commented on your post titled "' . $this->post->title . '".')
            ->line('Comment: "' . $this->comment->content . '"')
            ->action('View Post', url('/post/' . $this->post->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
