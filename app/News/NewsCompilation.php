<?php

namespace App\News;

class NewsCompilation 
{
    protected $news = [];

    public static function addNews(News $news): void
    {
        $this->news[] = $news;
    }

    public function getNews(): array
    {
        return $this->news;
    }

}
