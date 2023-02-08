<?php

use App\News\NewsParcer;
use App\News\News;
use App\News\NewsCompilation;

$templates = new League\Plates\Engine('../views');
$news = new NewsParcer();
$news->takeParcer();
$collector->get('/', function() use ($templates){
    
    return $templates->render('main');
});

$collector->get('/parce', function() use ($templates){
    

    return $templates->render('news', ['news' => NewsCompilation::getNews()]);
});

$collector->get('/news/{id}', function($id) use ($templates){
    //return $id;
    return $templates->render('item', ['item' => NewsCompilation::getNewsById($id)]);
});

$collector->post('/save', function()use ($templates){
    $db = new NewsDb();
    $query = "INSERT INTO temporary_news (id, title, text, date) VALUES (?,?,?,?)";
    $stmt = $db->dbh->prepare($query);
    $stmt->execute(['12', 'title', 'text', '2023-01-31']);
    
});