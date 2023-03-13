<?php

namespace App\Controllers;

use App\Db;

class Controller
{
    protected $template;
    protected $db;

    public function __construct()
    {
        $this->template = new \League\Plates\Engine('../views');
        $this->db = new Db;
    }
}