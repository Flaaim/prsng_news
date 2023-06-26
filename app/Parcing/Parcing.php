<?php

namespace App\Parcing;

interface Parcing
{
    public function __construct($url);
    public function parce();
}