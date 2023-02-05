<?php

namespace App\News;

use App\Abstract\ParcerManager;
use App\News\News;
use App\Interfaces\Entity;
use App\Interfaces\ParceSettings;

class NewsParcer extends ParcerManager
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
