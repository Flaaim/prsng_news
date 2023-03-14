<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    protected $db;
    
    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    public function getDb()
    {
        return $this->db;
    }
}