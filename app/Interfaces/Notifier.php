<?php

namespace App\Interfaces;

use GuzzleHttp\Client;
use App\Db;

interface Notifier
{
    public function send($message, $id);
    public function __construct(Client $client, Db $db);
}