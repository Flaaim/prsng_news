<?php

namespace App\Interfaces;

use App\Interfaces\ParceSettings;

interface Entity {
    public function parce(ParceSettings $settings);
}