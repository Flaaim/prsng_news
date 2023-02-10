<?php

namespace App\Notifier;

use App\Interfaces\Notifier;
use GuzzleHttp\Client;

class TelegramNotifier implements Notifier
{
    const LINK = 'https://api.telegram.org/bot6197195935:AAGaSdMh8ldp5ip010zeVV23ZkjNDRbsztY/';

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function send($message)
    {
        $this->client->get($message);
    }

    public function buildLink($text): string
    {
        return self::LINK."sendMessage?chat_id=@help_ot_news&text=$text";   
    }

}