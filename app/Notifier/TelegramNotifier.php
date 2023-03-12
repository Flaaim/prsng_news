<?php

namespace App\Notifier;

use App\Interfaces\Notifier;

use GuzzleHttp\Client;
use App\Models\News;

class TelegramNotifier implements Notifier
{
    const LINK = 'https://api.telegram.org/bot6197195935:AAGaSdMh8ldp5ip010zeVV23ZkjNDRbsztY/';

    protected $client;
    protected $news;

    public function __construct(Client $client, News $news)
    {
        $this->client = $client;
        $this->news = $news;
    }
    public function send($message, $id)
    {
        if($this->news->checkStatus($id)){
            $this->news->changeStatus($id);
            $this->client->get($message);
        } else {
            die('Статья уже добавлена в ТГ. Вернитесь на <a href="/">главную</a>');
        }
        
        
    }
    public function buildLink($text): string
    {
        return self::LINK."sendMessage?chat_id=1954013093&text=$text&parse_mode=markdown";   
    }

}