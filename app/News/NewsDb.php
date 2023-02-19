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

    public function save($idnews, $title, $text, $date): void
    {
        $sql = "INSERT IGNORE INTO news (idnews, title, text, date) VALUES (?, ?, ?, ?)";
        try{
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([$idnews, $title, $text, $date]);
        }catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function index(): array
    {
        $sql = "SELECT id, idnews, title, DATE_FORMAT(date, \"%d.%m.%Y\") as date, status FROM news ORDER BY id DESC";
        try{
            $data = $this->dbh->query($sql)->fetchAll();
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
        return $data;
    }
    public function show($id)
    {
        $sql = "SELECT id, title, DATE_FORMAT(date, \"%d.%m.%Y г.\") as date, text FROM news WHERE id=?";
        try{
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([$id]);
            $item = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $item;
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function changeStatus($id)
    {
        $sql = "UPDATE news SET status = \"1\" WHERE id=?";
        try{
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([$id]);
            return true;
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function checkStatus($id)
    {
        $sql = "SELECT id, status FROM news WHERE id=?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$id]);
        $item = $stmt->fetch(\PDO::FETCH_ASSOC);
        return ($item['status'] == "1") ? false : true;
    }
}
