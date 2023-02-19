<?php

namespace App\Notifier;

use App\Interfaces\Notifier;
use GuzzleHttp\Client;
use App\News\NewsDb;

class TelegramNotifier implements Notifier
{
    const LINK = 'https://api.telegram.org/bot6197195935:AAGaSdMh8ldp5ip010zeVV23ZkjNDRbsztY/';

    protected $client;
    protected $db;

    public function __construct()
    {
        $this->client = new Client();
        $this->db = new NewsDb();
    }
    public function send($message, $id)
    {
        if($this->db->checkStatus($id)){
            $this->db->changeStatus($id);
            $this->client->get($message);
        } else {
            die('Статья уже добавлена в ТГ. Вернитесь на <a href="/">главную</a>');
        }
        
        
    }
    public function buildLink($text): string
    {
        return self::LINK."sendMessage?chat_id=@help_ot_news&text=$text&parse_mode=markdown";   
    }

}