<?php

use App\News\NewsCompilation;
use App\News\NewsParcer;


$collector->get('/', function() use ($templates, $db){
    return $templates->render('main', ['news' => $db->index()]);
});

$collector->post('/parce', function() use($templates, $client, $cookie, $db){
    $news = new NewsParcer();
    $news->takeParcer($client, $cookie, $db);
    return header("Location: /");
});

$collector->get('/news/{id}', function($id) use ($templates, $db){
    return $templates->render('item', ['item' => $db->show($id)]);
});

$collector->post('/send-tg', function()use ($tgNotifier){

    $message = $tgNotifier->buildLink($_POST['text']);
    $response = $tgNotifier->send($message, $_POST['id']); 
    return header("Location: /"); 
});
