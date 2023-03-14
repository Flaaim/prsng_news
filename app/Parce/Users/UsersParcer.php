<?php

namespace App\Parce\Users;

use App\Abstract\ParcerManager;
use App\Interfaces\Entity;
use App\Abstract\ParceSettings;

class UsersParcer extends ParcerManager
{
    public function makeParcer($parcerModel): Entity
    {
        return new $parcerModel();
    }
    public function setSetting($client, $cookie, $db): ParceSettings
    {
        return new UsersSettings($client, $cookie, $db);
    }
}