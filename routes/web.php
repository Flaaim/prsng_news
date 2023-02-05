<?php

use App\NewsParce;
use App\StorageSafetyNews;
use App\ParcerNews;
use App\News;
use App\NewsDb;

$templates = new League\Plates\Engine('../views');

$collector->get('/', function() use ($templates){
    
    return $templates->render('main');
});

$collector->get('/parce', function() use ($templates){
    $news = new ParcerNews();
    $news->takeParcer();
    
    
    return $templates->render('news', ['news' => News::$news]);
});

$collector->get('/news/{id}', function($id){
    return 'Id is: '.$id;
});

$collector->post('/save', function()use ($templates){
    $db = new NewsDb();
    $query = "INSERT INTO temporary_news (id, title, text, date) VALUES (?,?,?,?)";
    $stmt = $db->dbh->prepare($query);
    $stmt->execute(['12', 'title', 'text', '2023-01-31']);
    
});