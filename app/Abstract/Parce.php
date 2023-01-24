<?php

namespace App\Abstract;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

abstract class Parce
{
    public function __construct(
        protected $client = new Client(),
        protected $jar = new CookieJar(),
        protected $domain = ''
    ) {
    }
    public function getClient(): Client
    {
        return $this->client;
    }
    public function getJar(): CookieJar
    {
        return $this->jar;
    }
    abstract public function parce();
}
