<?php

namespace Wfm;

use Wfm\TSingleton;

class Registry
{
    use TSingleton;

    public $properties = [];


    public function getProperty($key)
    {
        return $this->properties[$key];
    }
    public function setProperty($key, $value)
    {
        $this->properties[$key] = $value;
    }
}