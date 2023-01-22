<?php

namespace App;

class SafetyNews extends News
{
    protected $id;
    protected $title;
    protected $date;
    protected $text;

    public function __construct($id, $title, $date, $text)
    {
        parent::__construct($id, $title, $date, $text);
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