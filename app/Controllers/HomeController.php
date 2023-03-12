<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{

    public function index()
    {
        $news = new News();
        return $this->template->render('main', [
            'news' => $news->index(), 
            'count' => $news->getDb()->getNumberOfPage(), 
            'page' => $news->getDb()::$page, 
            'currentPage' => $news->getDb()->getCurrentpage()
        ]);
    }

    public function show($id)
    {
        $item = new News();
        return $this->template->render('item', ['item' => $item->show($id)]);
    }
}

