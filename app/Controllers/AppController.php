<?php

namespace App\Controllers;

use Wfm\Controller;
use App\Models\User;

class AppController extends Controller
{
    public function __construct($route)
    {

        if(!User::isAuth() && $route['action'] != 'login'){
            redirect('/user/login');
        }
        parent::__construct($route);
    }
}