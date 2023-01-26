<?php

namespace App;

use App\Interfaces\News;

class SafetyNews implements News
{
    public function __construct(
        protected $id,
        protected $title,
        protected $date,
        protected $text
    ) {
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDate(): string
    {
        return $this->date;
    }
    public function getText(): string
    {
        return $this->text;
    }


}
