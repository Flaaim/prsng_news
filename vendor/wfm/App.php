<?php

namespace Wfm;

use Wfm\ErrorHandler;
use Wfm\Router;

class App
{
    public static $app;

    public function __construct()
    {
        $url = ltrim(urldecode($_SERVER['REQUEST_URI']), '/');
        session_start();
        self::$app = Registry::getInstance();
        new ErrorHandler();
        $this->getParams();
        Router::dispatch($url);
    }
    public function getParams()
    {
        if(file_exists(CONFIG."/params.php")){
            require_once CONFIG."/params.php";
            if(is_array($params)){
                foreach($params as $key => $item){
                    self::$app->setProperty($key, $item);
                }
            }
        }
    }
}