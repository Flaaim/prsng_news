<?php

namespace App\Interfaces;

use App\Abstract\ParceSettings;

interface Entity
{
    public function parce(ParceSettings $settings);
}
