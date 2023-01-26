<?php

require "../vendor/autoload.php";

use DiDom\Document;
use App\SafetyNews;
use App\StorageNews;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use App\NewsParce;

$collector = new RouteCollector();

function processInput($uri): string
{
    $uri = urldecode(parse_url($uri, PHP_URL_PATH));
    return $uri;
}

$collector->get('/', function(){
    
    $parce = new NewsParce();
    $parce->parce();

    $templates = new League\Plates\Engine('../views');
    return $templates->render('news', ['news' => StorageNews::getNews()]);
});

$collector->get('/ini', function(){
    return 'ini page';
});

$dispatcher =  new Dispatcher($collector->getData());

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], processInput($_SERVER['REQUEST_URI']));
    //$dispatcher->dispatch('GET', '/ini'), "\n";
}catch(Phroute\Phroute\Exception\HttpRouteNotFoundException $e){
    echo $e->getMessage();
    die();
}catch(Phroute\Phroute\Exception\HttpMethodNotAllowedException $e){
    echo $e->getMessage();
    die();
}
echo $response;

