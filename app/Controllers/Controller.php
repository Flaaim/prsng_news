<?php

namespace App\Controllers;

use App\Db;

class Controller
{
    protected $template;

    public function __construct()
    {
        $this->template = new \League\Plates\Engine('../views');
    }
}