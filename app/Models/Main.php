<?php

namespace App\Models;

use App\Models\AppModel;

class Main extends AppModel
{
    public function getAll()
    {
        
        try{
            $sql = "SELECT * FROM test";
            $stmt = $this->db->query($sql);
            return $stmt->fetchALL(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        
    }
}