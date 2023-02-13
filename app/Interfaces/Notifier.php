<?php

namespace App\Interfaces;

interface Notifier
{
    public function send($message, $id);
    public function __construct();
}