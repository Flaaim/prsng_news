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

}