<?php 

namespace App\Ohranatruda;

use App\Interfaces\Entity;
use App\Ohranatruda\Ohranatruda;
use App\Interfaces\ParceSettings;
use App\Abstract\ParcerManager;

class OhranatrudaParcer extends ParcerManager
{
    public function makeParcer(): Entity
    {
        return new Ohranatruda();
    }
    public function setSetting($client, $cookie, $db): ParceSettings
    {
        return new OhranatrudaSettings($client, $cookie, $db);
    }
}