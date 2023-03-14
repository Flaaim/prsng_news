<?php

namespace App;

trait TPagination
{
    public static $page;
    public static $resultPerPage = 8; 

    public function setPagination()
    {
        if(!isset($_GET['page'])){
            self::$page = 1;
        } else{
            self::$page = $_GET['page'];
        }
    }

    protected function paginationPostfix() {
        return " LIMIT ".self::getPageFirstResult().",".self::$resultPerPage;
    }

    public static function getPageFirstResult()
    {
        return (self::$page - 1) * self::$resultPerPage;
    }

    public function getCurrentpage()
    {
        if(!isset($_GET['page'])){
            return 1;
        } else {
            return $_GET['page'];
        }
    }

    public function getCountRows()
    {
        $sql = "SELECT COUNT(*) as count FROM news";
        try{
            $count = $this->getDb()->query($sql)->fetchColumn();
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
        return $count;
    }

    public function getNumberOfPage()
    {
        return ceil(self::getCountRows() / self::$resultPerPage);
    }
    public function getPagination()
    {
        return $this->pagination;
    }
}