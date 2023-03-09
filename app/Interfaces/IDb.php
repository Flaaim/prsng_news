<?php

namespace App\Interfaces;

interface IDb
{
    public function index(): array;
    public function save();
    public function show();

}