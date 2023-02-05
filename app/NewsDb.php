<?php

namespace App;

use App\Db;

class NewsDb extends Db 
{
    public $dbh;

    public function __construct()
    {
        parent::__construct();
    }

    public function save(Entity $entity)
    {

    }

}