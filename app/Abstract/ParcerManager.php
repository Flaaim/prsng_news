<?php

namespace App\Abstract;

use App\Interfaces\Entity;
use App\Abstract\ParceSettings;
use App\Models\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

abstract class ParcerManager
{
    abstract public function makeParcer(): Entity;
    abstract public function setSetting(Client $client, CookieJar $cookie, Model $model): ParceSettings;

    public function takeParcer(Client $client, CookieJar $cookie, Model $model)
    {
        $settings = $this->setSetting($client, $cookie, $model);
        $parcer = $this->makeParcer();
        $parcer->parce($settings);
    }
}
