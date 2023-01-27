<?php

use App\NewsParce;
use App\StorageSafetyNews;
use App\ParcerNews;
use App\News;


$collector->get('/', function(){
    
    $news = new ParcerNews();
    $news->takeParcer();
    
    //$templates = new League\Plates\Engine('../views');
    //return $templates->render('news', ['news' => StorageSafetyNews::getNews()]);
});

$collector->get('/ini', function(){
    return 'ini page';
});