<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    protected $settings = 
    [
        'SMTPDebug' => 'SMTP::DEBUG_SERVER',
        'Host' => 'smtp.example.com',
        'SMTPAuth' => true,
        'Username' => 'user@example.com',
        'Password' => 'password',
        'SMTPSecure' => PHPMailer::ENCRYPTION_SMTPS,
        'Port' => '465'
    ];

    protected $recipients =
    [
        'from' => 'admin@help-ot.ru'
    ];

    protected $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }
    public function setSettings($mailer)
    {
        $
    }
    public function setContent()
    {
        $this->mailer->isHTML(true);
        $this->mailer->Subject = 'Ttest';
        $this->mailer->Body = 'This is the HTML message body <b>in bold!</b>';
    }

    public function send()
    {
        $this->mailer->send();
    }
}