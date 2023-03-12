<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
    }
    public function getDb()
    {
        return $this->db;
    }
}