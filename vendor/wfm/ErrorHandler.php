<?php

namespace Wfm;

class ErrorHandler 
{
    public function __construct()
    {
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    public function exceptionHandler(\Throwable $e)
    {
        $this->displayError("Исключение", $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }
    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->displayError($errno, $errstr, $errfile, $errline);
    }
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        if($response == 0){
            $response = 404;
        }
        http_response_code($response);
        if($response == 404 && !DEBUG){
            require_once WWW . "/errors/404.php";
        }
        if(DEBUG){
            require_once WWW . "/errors/develop.php";
        } else {
            require_once WWW . "/errors/production.php";
        }
        die();
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last();
        if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR)){
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }else{
            ob_end_flush();
        }
    }

}