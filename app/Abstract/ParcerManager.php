<?php

namespace App\Abstract;

use App\Interfaces\Entity;
use App\Interfaces\ParceSettings;

abstract class ParcerManager
{
    abstract public function makeParcer(): Entity;
    abstract public function setSetting($client, $cookie, $db): ParceSettings;

    public function takeParcer($client, $cookie, $db)
    {
        $settings = $this->setSetting($client, $cookie, $db);
        $parcer = $this->makeParcer();
        $parcer->parce($settings);
    }
}
