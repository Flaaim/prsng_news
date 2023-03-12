<?php 

namespace App\Parce\Ohranatruda;

use App\Abstract\ParceSettings;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Abstract\Db;
use App\Models\Model;

class OhranatrudaSettings extends ParceSettings
{
    public const DOMAIN = 'https://xn--80akibcicpdbetz7e2g.xn--p1ai';

}