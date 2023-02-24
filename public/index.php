<?php

require "../vendor/autoload.php";

use DiDom\Document;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use App\News\NewsParcer;
use App\News\News;
use App\Notifier\TelegramNotifier;
use App\News\NewsDb;
use App\Ohranatruda\OhranatrudaDb;

$collector = new RouteCollector();

function processInput($uri): string
{
    $uri = urldecode(parse_url($uri, PHP_URL_PATH));
    return $uri;
}

$templates = new League\Plates\Engine('../views');
$db = new NewsDB();
$dbo = new OhranatrudaDb();

$tgNotifier = new TelegramNotifier();


require "../routes/web.php";

$dispatcher =  new Dispatcher($collector->getData());

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], processInput($_SERVER['REQUEST_URI']));
}catch(Phroute\Phroute\Exception\HttpRouteNotFoundException $e){
    echo $e->getMessage();
    die();
}catch(Phroute\Phroute\Exception\HttpMethodNotAllowedException $e){
    echo $e->getMessage();
    die();
}
echo $response;

