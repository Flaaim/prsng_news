<?php

namespace App\Interfaces;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Abstract\Db;

interface ParceSettings
{
    public function __construct(Client $client, CookieJar $cookie, Db $db);
}
