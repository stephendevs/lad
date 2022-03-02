<?php

namespace Stephendevs\Lad;

class MailSender {

    public $email;

    public function __construct($name, $email, $message)
    {
        $this->email = $email;
    }

    public function __toString()
    {
        return 'hello';
    }


}