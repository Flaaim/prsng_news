<?php

namespace App\Controllers;

use App\Controllers\AppController;

class MainController extends AppController
{
    public function indexAction()
    {     
        $data = $this->model->getAll();
        
        $this->setMeta('Homepage', 'Homepage description', 'Keywords description');
        $this->set(compact('data'));
        
    }
}