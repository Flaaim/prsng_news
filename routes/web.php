
<?php

use App\News\NewsCompilation;
use App\News\NewsParcer;
use App\Ohranatruda\OhranatrudaParcer;
use App\Users\UsersParcer;
use App\Users\Users;

$collector->get('/', function() use ($templates, $db){
    return $templates->render('main', [
        'news' => $db->index(), 
        'count' => $db->getNumberOfPage(), 
        'page' => $db->getPagination()::$page, 
        'currentPage' => $db->getPagination()->getCurrentpage()
    ]);
});

//Parsing news

$collector->group(['prefix' => 'news'], function($collector)use($templates, $client, $cookie, $db){
    $collector->post('/parce', function() use($templates, $client, $cookie, $db){
        $news = new NewsParcer();
        $news->takeParcer($client, $cookie, $db);
        return header("Location: /");
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
        return header("Location: /");
    });
});






$collector->post('/send-tg', function()use ($tgNotifier){
    $message = $tgNotifier->buildLink($_POST['text']);
    $response = $tgNotifier->send($message, $_POST['id']); 
    return header("Location: /"); 
});

