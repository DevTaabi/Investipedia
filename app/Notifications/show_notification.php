<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class show_notification extends Notification
{
    use Queueable;

    protected $comment;
    protected $likes;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment,$likes)
    {
        $this->comment = $comment;
        $this->likes = $likes;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'comment' => $this->comment,
            'likes' => $this->likes,
            'user' => auth()->user()
//            'repliedTime' => Carbon::now()
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
