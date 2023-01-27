<?php

namespace App;

abstract class ParcerManager
{
    abstract public function makeParcer(): Entity;

    public function takeParcer()
    {
        $parcer = $this->makeParcer();
        $parcer->parce();
    }
}