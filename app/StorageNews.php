<?php

namespace App;

class StorageNews
{
    private static $news = [];

    public static function addNews(News $news): void
    {
        self::$news[] = $news;
    }

    public static function getNews(): array
    {
        return self::$news;
    }
}
