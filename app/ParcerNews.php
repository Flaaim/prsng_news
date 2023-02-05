<?php

namespace App;

use App\ParcerManager;
use App\News;

class ParcerNews extends ParcerManager
{
    public function makeParcer(): Entity
    {
        return new News();
    }

    public function setSetting(): ParceSettings
    {
        return new NewsSettings();
    }
}