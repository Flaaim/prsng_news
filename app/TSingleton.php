<?php

namespace App;

trait TSingleton
{
    protected static $instance;

    private function __construct()
    {}

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            return self::static();
        }
        return self::$instance;
    }
}