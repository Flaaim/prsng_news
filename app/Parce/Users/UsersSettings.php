<?php

namespace App\Parce\Users;

use App\Abstract\ParceSettings;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;


class UsersSettings extends ParceSettings
{
    public const DOMAIN = 'https://ohranatruda.ru/ssot/user/';


    public function __construct(
        protected $client, 
        protected $cookie, 
        protected $db
        )
    {}

}