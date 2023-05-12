<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewComment extends Notification {
    use Queueable;

    protected $postTitle;
    protected $postId;

    /**
     * Create a new notification instance.
     */
    public function __construct($postTitle, $postId) {
        $this->postTitle = $postTitle;
        $this->postId = $postId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return ["mail"];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        return (new MailMessage())
                    ->subject('New Comment - ' . $this->postTitle)
                    ->greeting('Hello!')
                    ->line('There is a new comment on your post.')
                    ->action('Manage your comments', url('/posts/' . $this->postId . '/manage'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array {
        return [
                //
            ];
    }
}
