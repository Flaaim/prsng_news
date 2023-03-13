<?php

namespace App;

use App\Pagination;
use App\TPagination;
use App\TSingleton;

class Db
{   
    public $pdo;

    public function __construct()
    {
        try{
            require ROOT . "/config/configDb.php";
            $this->pdo = new \PDO($conn['dsn'],$conn['user'], $conn['password'], [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getDb()
    {
        return $this->pdo;
    }

}