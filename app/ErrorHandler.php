<?php

namespace App;

class ErrorHandler
{
    public function __construct()
    {
        error_reporting(-1);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler(\Throwable $e, $code)
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError("Исключение", $e->getMessage(), $e->getFile(), $e->getLine(), $code);
    }
    protected function logError($message = '', $file = '', $line = '')
    {
        file_put_contents(dirname(__DIR__).'/tmp/logs/error.log', "[".date('d.m.Y h:i:s '). "Сообщение: ".$message .", Файл: ".$file.", Строка: ".$line."] \r\n", FILE_APPEND);
    }
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);
        require_once dirname(__DIR__).'/public/development.php';
    }
}