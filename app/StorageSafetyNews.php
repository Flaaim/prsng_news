<?php

namespace App;

class StorageSafetyNews
{
    private static $news = [];

    public static function addNews($id, $title, $date, $text)
    {
        self::$news[] = new SafetyNews($id, $title, $date, $text);
    }

    public static function getNews(): array
    {
        return self::$news;
    }
}
