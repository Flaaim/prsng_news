<?php

namespace App\Interfaces;

interface Notifier
{
    public function send($message);
}