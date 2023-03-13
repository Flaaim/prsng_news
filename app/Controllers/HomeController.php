<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{

    public function index()
    {
        $news = new News($this->db);
        return $this->template->render('main', [
            'news' => $news->index(), 
            //'count' => $news->getNumberOfPage(), 
            //'page' => $news->db::$page, 
            //'currentPage' => $news->db->getCurrentpage()
        ]);
    }

    public function show($id)
    {
        $item = new News();
        return $this->template->render('item', ['item' => $item->show($id)]);
    }
}

