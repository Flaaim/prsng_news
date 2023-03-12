<?php 

namespace App\Parce\Ohranatruda;

use App\Interfaces\Entity;
use App\Parce\Ohranatruda\Ohranatruda;
use App\Abstract\ParceSettings;
use App\Abstract\ParcerManager;
use App\Models\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class OhranatrudaParcer extends ParcerManager
{
    public function makeParcer(): Entity
    {
        return new Ohranatruda();
    }
    public function setSetting(Client $client, CookieJar $cookie, Model $model): ParceSettings
    {
        return new OhranatrudaSettings($client, $cookie, $model);
    }
}