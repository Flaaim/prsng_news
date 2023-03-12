<?php

namespace App\Controllers;

use App\Notifier\TelegramNotifier;
use App\Models\News;
use GuzzleHttp\Client;

class NotifierController extends Controller
{
    public function send()
    {
        $news = new News();
        $client = new Client();
        $tgNotifier = new TelegramNotifier($client, $news);
        $message = $tgNotifier->buildLink($_POST['text']);
        $response = $tgNotifier->send($message, $_POST['id']); 
        return header("Location: /"); 
    }
}