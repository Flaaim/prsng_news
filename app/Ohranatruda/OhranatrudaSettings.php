<?php 

namespace App\Ohranatruda;

use App\Interfaces\ParceSettings;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Abstract\Db;

class OhranatrudaSettings implements ParceSettings
{
    public const DOMAIN = 'https://xn--80akibcicpdbetz7e2g.xn--p1ai';
    protected $client;
    protected $db;

    public function __construct()
    {
        $this->client = new Client();
        $this->db = new OhranatrudaDb();
    }
    public function getClient()
    {
        return $this->client;
    }
    public function getDb()
    {
        return $this->db;
    }
}