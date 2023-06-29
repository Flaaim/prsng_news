<?php

namespace App\Controllers;

use App\Controllers\AppController;
class MainController extends AppController
{
    public function indexAction()
    {     


        $this->setMeta('Homepage', 'Homepage description', 'Keywords description');

        
    }
}