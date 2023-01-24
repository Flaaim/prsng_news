<?php

namespace App;

class News 
{
    protected $id;
    protected $title;
    protected $date;
    protected $text;

    public function __construct($id, $title, $date, $text)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->text = $text;
    }
    public function getTitle():string
    {
        return $this->title;
    }
    public function getDate():string
    {
        return $this->date;
    }
    public function getText():string
    {
        return $this->text;
    }
}