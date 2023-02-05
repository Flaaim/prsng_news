<?php

namespace App;

abstract class ParcerManager
{
    abstract public function makeParcer(): Entity;
    abstract public function setSetting(): ParceSettings;
    public function takeParcer()
    {
        $settings = $this->setSetting();
        $parcer = $this->makeParcer();
        $parcer->parce($settings);        
    }
}