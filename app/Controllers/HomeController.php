<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\News;
use App\Db;

class HomeController extends Controller
{

    public function index()
    {
        $news = new News();
        return $this->template->render('main', [
            'news' => $news->index(), 
            'count' => $news->getNumberOfPage(), 
            'page' => $news::$page, 
            'currentPage' => $news->getCurrentpage()
        ]);
    }

    public function show($id)
    {
        $item = new News();
        return $this->template->render('item', ['item' => $item->show($id)]);
    }
}

