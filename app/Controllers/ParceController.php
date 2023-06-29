<?php

namespace App\Controllers;

use App\Controllers\AppController;
use App\Parcing\Kodeks;
use GuzzleHttp\Client;

class ParceController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Парсинг', 'Страница парсинга сайтов', '');
        $news = $this->model->get_parcing_news();
        $parcingSources = $this->model->get_parcing_sources();
        $this->set(compact('parcingSources', 'news'));
    }

    public function viewAction()
    {
        $oneNews = $this->model->get_one_news($this->route['slug']);
        if(empty($oneNews)){
            throw new \Exception("Новость не найдена", 404);
        }
        $this->setMeta("Новость: {$oneNews['title']}", "Описание новости: {$oneNews['title']}", '');
        $this->set(compact('oneNews'));
    }
    public function kodeksAction()
    {

        if(!empty($_POST)){
            $url = $_POST['source'];
            if(!$url){
                throw new \Exception("URL не найден", 500);
            }
            $url = filter_var($_POST['source'], FILTER_VALIDATE_URL);
            if(!$url){
                throw new \Exception("Формат URL не прошел проверку", 500);
            }
            $kodeks = new Kodeks($url);
            if($kodeks->parce()){
                $_SESSION['success'] = "Сайт успешно спарсен";
            }else{
                $_SESSION['error'] = "Ошибка парсинга";
            }

            redirect('/parce/index');
        }

        die();
    }

    public function sendAction()
    {
        if(!empty($_POST)){
            $title = $_POST['title'];
            $content = $_POST['content'];

            $client = new Client();
            $telegram = new \App\Models\Telegram();
            $link = $telegram->buildLink($title, $content);
            $client->get($link);
            $_SESSION['success'] = "Сообщение успешно отправлено в телеграмм канал";
            redirect('/parce/index');
        }
        die();
    }
    public function deleteAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = get('id');
            if($this->model->deleteNews($id)){
                $answer = ['status' => 'success', 'message' => 'Запись успешно удалена!'];
            }else{
                $answer = ['status' => 'error', 'message' => 'Id не найден'];
            }
            exit(json_encode($answer));
        }
    }
}