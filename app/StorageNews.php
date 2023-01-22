<?php

namespace App;

class StorageNews
{
    static private $news = [];

    
    static function addNews(News $news)
    {
        self::$news[] = $news;
    }

    static function getNews()
    {
        return self::$news;
    }
    


}