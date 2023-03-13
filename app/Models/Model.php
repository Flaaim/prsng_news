<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    public $db;
    public function __construct(Db $db)
    {
       $this->db = $db;
    }
}