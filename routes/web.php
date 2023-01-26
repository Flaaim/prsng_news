<?php

use App\NewsParce;
use App\StorageSafetyNews;

$collector->get('/', function(){
    
    $parce = new NewsParce();
    $parce->parce();

    $templates = new League\Plates\Engine('../views');
    return $templates->render('news', ['news' => StorageSafetyNews::getNews()]);
});

$collector->get('/ini', function(){
    return 'ini page';
});