<?php

namespace App\News;

use App\Abstract\Db;

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
