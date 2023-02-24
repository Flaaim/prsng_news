<?php

use App\News\NewsCompilation;
use App\News\NewsParcer;
use App\Ohranatruda\OhranatrudaParcer;

$collector->get('/', function() use ($templates, $db){
    return $templates->render('main', ['news' => $db->index()]);
});

$collector->post('/parce', function() use($templates){
    $news = new NewsParcer();
    $news->takeParcer();
    return header("Location: /");
});
$collector->get('/ot-parce', function() use($templates){
    $ot = new OhranatrudaParcer();
    $ot->takeParcer();
    //return header("Location: /");
});
$collector->get('/news/{id}', function($id) use ($templates, $db){
    return $templates->render('item', ['item' => $db->show($id)]);
});

$collector->post('/send-tg', function()use ($tgNotifier){
    $message = $tgNotifier->buildLink($_POST['text']);
    $response = $tgNotifier->send($message, $_POST['id']); 
    return header("Location: /"); 
});
