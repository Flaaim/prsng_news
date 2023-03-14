<?php

namespace App;

class Db
{   
    protected static $instance = null;

    private function __construct()
    {}

    public static function getInstance()
    {
        require_once ROOT . "/config/configDB.php";
        if(!self::$instance){
            return self::$instance = new \PDO($conn['dsn'],$conn['user'], $conn['password'], [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        }
        return self::$instance;
    }
}