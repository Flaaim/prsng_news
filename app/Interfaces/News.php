<?php

namespace App\Interfaces;

interface News{
    public function getId();
    public function getTitle(): string;
    public function getDate(): string;
    public function getText(): string;
}