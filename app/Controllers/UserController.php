<?php

namespace App\Controllers;



class UserController extends Controller
{
    public function index()
    {
        return $this->template->render('users');
    }
}