<?php

namespace App\News;

class NewsCompilation 
{
    protected static $news = [];

    public static function addNews(array $news): void
    {
        self::$news[] = $news;
    }

    public static function getNews(): array
    {
        return self::$news;
    }

}
