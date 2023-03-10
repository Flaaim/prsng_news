<?php

require_once "../vendor/autoload.php";
require_once "../config/init.php";

use DiDom\Document;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use App\News\NewsParcer;
use App\News\News;
use App\Notifier\TelegramNotifier;
use App\Db;
use App\ErrorHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

$collector = new RouteCollector();
$error = new ErrorHandler();


function processInput($uri): string
{
    $uri = urldecode(parse_url($uri, PHP_URL_PATH));
    return $uri;
}





require "../routes/web.php";

$dispatcher =  new Dispatcher($collector->getData());

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], processInput($_SERVER['REQUEST_URI']));
}catch(Phroute\Phroute\Exception\HttpRouteNotFoundException $e){
    $error->exceptionHandler($e);
    die();
}catch(Phroute\Phroute\Exception\HttpMethodNotAllowedException $e){
    $error->exceptionHandler($e);
    die();
}
echo $response;


