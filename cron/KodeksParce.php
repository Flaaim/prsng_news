<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . "/config/init.php";

$cron = new \App\Parcing\Kodeks("https://cntd.ru");
$cron->parce();

