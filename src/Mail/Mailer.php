<?php

namespace Stephendevs\Lad\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    public $sender, $message, $subject, $markdown;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $subject, $message = 'Mail Message', $markdown = null)
    {
        $this->sender = $sender;
        $this->subject = $subject;
        $this->message = $message;
        $this->markdown = $markdown;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from($this->sender)
        ->subject($this->subject)
        ->markdown($this->markdown)
        ->with($this->message);
    }

}
