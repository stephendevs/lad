<?php

namespace Stephendevs\Phoebi\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminStatusNotification extends Notification
{
    use Queueable;

    private $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->status){
            return (new MailMessage)
            ->subject('Account Blocked')
            ->line('Your account has been blocked')
            ->line('You can not access access admin dashboard until your account is unblocked');
        }
        return (new MailMessage)
        ->subject('Account Unblocked')
        ->line('Your account has been unblocked')
        ->line('You can now access access admin dashboard')
        ->line('Thank You');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
