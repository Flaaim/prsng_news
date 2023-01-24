<?php

require "../vendor/autoload.php";

use DiDom\Document;
use App\SafetyNews;
use App\StorageNews;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use App\NewsParce;


$collector = new RouteCollector();

$collector->get('/', function(){
    
    $parce = new NewsParce();
    $parce->parce();

    $templates = new League\Plates\Engine('../views');
    return $templates->render('news', ['news' => StorageNews::getNews()]);
});

$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch('GET', '/'), "\n";
