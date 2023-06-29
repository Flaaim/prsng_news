<?php

namespace App\Models;

use App\Models\AppModel;

class User extends AppModel
{
    public static function isAuth()
    {
        return (isset($_SESSION['user']));
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email && $password){
            $sql = "SELECT email, password FROM user WHERE email = ?";
            try{
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$email]);
                $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
            if($user){
                if(password_verify($password, $user['password'])){
                    foreach ($user as $key => $value){
                        if($key != 'password'){
                            $_SESSION['user'][$key] = $value;
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}