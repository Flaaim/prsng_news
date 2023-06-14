<?php

namespace Wfm;

use Wfm\TSingleton;

class Db extends \PDO
{
    use TSingleton;

    private function __construct()
    {
        try{
            require_once(CONFIG . "/configDB.php");
            parent::__construct($dsn, $user, $pass, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
            
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}