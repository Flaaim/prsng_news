<?php

namespace App;

abstract class Db {
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=192.168.56.56;dbname=parce','homestead', 'secret');
    }

    abstract function save(Entity $entity);
}