<?php

namespace App\Abstract;

abstract class Db {
    protected $dbh;

    public function __construct()
    {
        try{
            $this->dbh = new \PDO('mysql:host=192.168.56.56;dbname=parce','homestead', 'secret', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
        
        
    }
    abstract function save($idnews, $title, $text, $date);
    abstract function index();
    abstract function show($id);
}