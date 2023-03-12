
<?php

$collector->get('/', ['App\Controllers\HomeController', 'index']);
$collector->get('/{id}', ['App\Controllers\HomeController', 'show']);

$collector->group(['prefix' => 'news'], function($collector){
    $collector->post('/parce', ['App\Controllers\ParceController', 'parce']);
    $collector->post('/parce-ot', ['App\Controllers\ParceController', 'parce_ot']);
});

$collector->post('/send-tg', ['App\Controllers\NotifierController', 'send']);


//Parsing news
/*
$collector->group(['prefix' => 'news'], function($collector)use($templates, $client, $cookie, $db){
    $collector->post('/parce', function() use($templates, $client, $cookie, $db){

    });
    $collector->post('/parce-ot', function() use($templates, $client, $cookie, $db){
        $ot = new OhranatrudaParcer();
        $ot->takeParcer($client, $cookie, $db);
        return header("Location: /");
    });
    $collector->get('/{id}', function($id) use ($templates, $db){
        return $templates->render('item', ['item' => $db->show($id)]);
    });
});


//Parcing users

$collector->group(['prefix' => 'users'], function($collector) use ($templates, $client, $cookie, $db){
    $collector->get('/', function() use($templates){
        $usersLast = Users::LAST;
        return $templates->render('users', ['userLast' => $usersLast]);
    });

    $collector->post('/parce-us', function() use($templates, $client, $cookie, $db){
        $ot = new UsersParcer();
        $ot->takeParcer($client, $cookie, $db);
        return header("Location: /users");
    });
});


$collector->post('/send-tg', function()use ($tgNotifier){
    $message = $tgNotifier->buildLink($_POST['text']);
    $response = $tgNotifier->send($message, $_POST['id']); 
    return header("Location: /"); 
});

*/







