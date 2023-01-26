<?php

require "../vendor/autoload.php";

use DiDom\Document;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;


$collector = new RouteCollector();

function processInput($uri): string
{
    $uri = urldecode(parse_url($uri, PHP_URL_PATH));
    return $uri;
}

require "../routes/web.php";

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

