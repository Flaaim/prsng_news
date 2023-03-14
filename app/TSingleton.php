<?php

namespace App;

trait TSingleton
{
    protected static $instance = null;

    private function __construct()
    {}

    public static function getInstance()
    {
        if(!self::$instance){
            return self::$instance = new static;
        }
        return self::$instance;
    }
}