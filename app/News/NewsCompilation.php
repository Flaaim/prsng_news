<?php

namespace App\News;

class NewsCompilation 
{
    protected static $news = [];

    public static function addNews(array $news, string $id): void
    {
        self::$news["$id"] = $news;
    }

    public static function getNews(): array
    {
        return self::$news;
    }

    public static function getNewsById($id)
    {
        return self::$news[$id];
    }

}
