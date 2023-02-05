<?php

use App\News\NewsParcer;
use App\News\News;

$templates = new League\Plates\Engine('../views');

$collector->get('/', function() use ($templates){
    
    return $templates->render('main');
});

$collector->get('/parce', function() use ($templates){
    $news = new NewsParcer();
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