<?php

namespace App;

use StorageNews;

abstract class News 
{
    public function __construct($id, $title, $date, $text)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->text = $text;
    }
}