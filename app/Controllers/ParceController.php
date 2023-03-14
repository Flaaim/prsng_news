<?php

namespace App\Controllers;

use App\Models\News;
use App\Models\OhranaTruda;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Parce\News\NewsParcer;
use App\Parce\OhranaTruda\OhranatrudaParcer;
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
        $parcerModel = $_POST['source'];
        $model = new News();
        $news = 'App\\Parce\\'.$parcerModel.'\\'.$parcerModel.'Parcer';
        $news = new $news();
        $parcerModel = 'App\\Parce\\'.$parcerModel.'\\'.$parcerModel;

        $news->takeParcer($this->client, $this->cookie, $model, $parcerModel);
        return header("Location: /");
    }

}