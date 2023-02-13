<?php

namespace App\News;

use App\Abstract\Db;

class NewsDb extends Db
{
    public $dbh;

    public function __construct()
    {
        parent::__construct();
    }

    public function save($id)
    {
        $sql = "INSERT INTO news (idnews) VALUES (?)";
        try{
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([$id]);
        }catch(\PDOException $e) {
                echo $e->getMessage();
        }
    }
}
