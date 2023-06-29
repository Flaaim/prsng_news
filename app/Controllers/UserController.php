<?php

namespace App\Controllers;

use App\Models\User;
class UserController extends AppController
{
    public function loginAction()
    {
        if(User::isAuth()){
            redirect("/");
        }
        $this->layout = 'login';

        if(!empty($_POST)){
            if($this->model->login()){
                $_SESSION['success'] = 'Вы успешно авторизовались';
                redirect(PATH);
            }else{
                $_SESSION['error'] = 'Ошибка авторизации';
                redirect();
            }
        }

    }

    public function logoutAction()
    {

        unset($_SESSION['user']);
        redirect();

    }
}