<?php

namespace Wfm;

use Wfm\Db;

abstract class Model
{
    public array $attributes = [];
    public array $errors = [];
    public array $rules = [];
    public array $labels = [];
    
    public $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
}