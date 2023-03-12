<?php

namespace App\Controllers;

class Controller
{
    protected $template;

    public function __construct()
    {
        $this->template = new \League\Plates\Engine('../views');
    }
}