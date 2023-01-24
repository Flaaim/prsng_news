<?php

namespace App;

class News
{
    public function __construct(
        protected $id,
        protected $title,
        protected $date,
        protected $text
    ) {
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
