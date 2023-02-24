<?php

namespace App\Ohranatruda;

use App\Abstract\Db;

class OhranatrudaDb extends Db {
    public $dbh;

    public function __construct()
    {
        parent::__construct();
    }

    public function save($idnews, $title, $text, $date)
    {
        $sql = "INSERT IGNORE INTO news (idnews, title, text, date) VALUES (?, ?, ?, ?)";
        
        try{
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([$idnews, $title, $text, $date]);
        }catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function index()
    {

    }
    public function show($id){

    }
}