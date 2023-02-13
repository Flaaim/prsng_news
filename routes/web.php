<?php

use App\News\NewsCompilation;

$collector->get('/', function() use ($templates){
    
    return $templates->render('main');
});

$collector->get('/parce', function() use ($templates){
    

    return $templates->render('news', ['news' => NewsCompilation::getNews()]);
});

$collector->get('/news/{id}', function($id) use ($templates){
    return $templates->render('item', ['item' => NewsCompilation::getNewsById($id)]);
});

$collector->post('/send-tg', function()use ($tgNotifier){

    $message = $tgNotifier->buildLink($_POST['text']);
    $response = $tgNotifier->send($message, $_POST['id']);  
});
