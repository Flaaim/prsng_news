<?php

namespace App\Users;

use App\Interfaces\ParceSettings;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Abstract\Db;

class UsersSettings implements ParceSettings
{
    public const DOMAIN = 'https://ohranatruda.ru/ssot/user/';


    public function __construct(
        protected $client, 
        protected $cookie, 
        protected $db
        )
    {}

    public function getClient()
    {
        return $this->client;
    }
    public function getDb()
    {
        return $this->db;
    }
}