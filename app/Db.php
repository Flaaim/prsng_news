<?php

namespace App;

use App\Pagination;
use App\TPagination;
use App\TSingleton;

class Db
{   
    use TPagination;
    use TSingleton;
    protected $dbh;

    public function __construct()
    {
        try{
            $conn = [
                'dsn' => 'mysql:host=192.168.56.56;dbname=parce',
                'user' => 'homestead',
                'password' => 'secret',
            ];
            $this->dbh = new \PDO($conn['dsn'],$conn['user'], $conn['password'], [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
        $this->setPagination();
    }
    public function getDbh()
    {
        return $this->dbh;
    }
}