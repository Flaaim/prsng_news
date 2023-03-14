<?php

namespace App\Parce\News;

use App\Abstract\ParcerManager;
use App\Parce\News\News;
use App\Interfaces\Entity;
use App\Abstract\ParceSettings;
use App\Models\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class NewsParcer extends ParcerManager
{
    public function makeParcer($parcerModel): Entity
    {
        return new $parcerModel();
    }

    public function setSetting(Client $client, CookieJar $cookie, Model $model): ParceSettings
    {
        return new NewsSettings($client, $cookie, $model);
    }
}
