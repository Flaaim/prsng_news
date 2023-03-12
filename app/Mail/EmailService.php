<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    private $emailer;

    public function __construct($emailer)
    {
        $this->emailer = $emailer;
    }

    public function send()
    {
        $this->emailer->send();
    }
}