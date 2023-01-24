<?php

namespace App\Abstract;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

abstract class Parce 
{
    protected $client;
    protected $jar;
    protected $domain;

    public function __construct()
    {
        $this->client = new Client();
        $this->jar = new CookieJar();
        $this->domain = '';
    }
    public function getClient()
    {
        return $this->client;
    }
    public function getJar()
    {
        return $this->jar;
    }

    abstract public function parce();
}