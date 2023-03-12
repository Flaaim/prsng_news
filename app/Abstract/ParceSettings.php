<?php

namespace App\Abstract;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Models\Model;

abstract class ParceSettings
{
    protected $client;
    protected $model;
    protected $cookie;

    public function __construct(Client $client, CookieJar $cookie, Model $model)
    {
        $this->client = $client;
        $this->cookie = $cookie;
        $this->model = $model;
    }
    public function getClient()
    {
        return $this->client;
    }
    public function getJar(): CookieJar
    {
        return $this->cookie;
    }
    public function getModel()
    {
        return $this->model;
    }
}