<?php

namespace App;

class Pagination 
{
    public static $page;
    public static $resultPerPage = 8; 
    
    public function __construct()
    {
        if(!isset($_GET['page'])){
            self::$page = 1;
        } else{
            self::$page = $_GET['page'];
        }
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
}