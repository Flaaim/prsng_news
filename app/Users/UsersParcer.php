<?php

namespace App\Users;

use App\Abstract\ParcerManager;
use App\Interfaces\Entity;
use App\Interfaces\ParceSettings;

class UsersParcer extends ParcerManager
{
    public function makeParcer(): Entity
    {
        return new Users();
    }
    public function setSetting($client, $cookie, $db): ParceSettings
    {
        return new UsersSettings($client, $cookie, $db);
    }
}