<?php

namespace App\Controllers;

use App\Models\News;
use App\Models\OhranaTruda;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Parce\News\NewsParcer;
use App\Parce\OhranaTruda\OhranaTrudaParcer;
use App\Db;

class ParceController extends Controller
{
    protected $client;
    protected $cookie;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client();
        $this->cookie = new CookieJar();
    }
    public function parce()
    {
        $model = new News();
        $news = new NewsParcer();
        $news->takeParcer($this->client, $this->cookie, $model);
        return header("Location: /");
    }
    public function parce_ot()
    {
        $model = new OhranaTruda();
        $news = new OhranatrudaParcer();
        $news->takeParcer($this->client, $this->cookie, $model);
        return header("Location: /");
    }
}