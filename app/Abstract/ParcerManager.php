<?php

namespace App\Abstract;

use App\Interfaces\Entity;
use App\Abstract\ParceSettings;
use App\Models\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

abstract class ParcerManager
{
    abstract public function makeParcer($parcerModel): Entity;
    abstract public function setSetting(Client $client, CookieJar $cookie, Model $model): ParceSettings;

    public function takeParcer(Client $client, CookieJar $cookie, Model $model, $parcerModel)
    {
        $settings = $this->setSetting($client, $cookie, $model);
        $parcer = $this->makeParcer($parcerModel);
        $parcer->parce($settings);
    }
}
