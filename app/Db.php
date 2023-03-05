<?php

namespace App;

use App\Pagination;
use App\TPagination;

class Db
{   
    use TPagination;

    public const STATUS_SEND = 'Отправлено';
    public const STATUS_UNSEND = 'Неотправлено';

    protected const SQL_INDEX = "SELECT news.id, idnews, title, DATE_FORMAT(date, \"%d.%m.%Y\") as date,  status, name FROM news LEFT JOIN source ON news.source_id = source.id  ORDER BY id DESC";

    
    protected $dbh;

    public function __construct()
    {
        try{
            $this->dbh = new \PDO('mysql:host=192.168.56.56;dbname=parce','homestead', 'secret', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
        $this->setPagination();
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
    public function index(): array
    {
        $sql = self::SQL_INDEX.$this->paginationPostfix();
        try{
            $data = $this->dbh->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
            $data = $this->setSource($data);
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
    public function setSource($data): array
    {
        foreach($data as &$value){
            if($value['status'] == '1'){
                $value['status'] = self::STATUS_SEND;
            }else{
                $value['status'] = self::STATUS_UNSEND;
            }
        }
        return $data;
    }

}