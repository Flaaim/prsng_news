<?php

namespace App\Interfaces;

use GuzzleHttp\Client;
use App\Models\News;

interface Notifier
{
    public function send($message, $id);
    public function __construct(Client $client, News $news);
}