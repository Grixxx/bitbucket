<?php
class SignInContr {

    public $error_fields = [];
    public $message_fields = [];
    public $all_fields = [];



    public function validateLogin($login){
        if ($login === '') {
            $this -> error_fields[] = 'login';
            $this -> message_fields[] = 'Заполните поле Логин';

        }

    }
    public function validatePassword($password){
        if ($password === '') {
            $this -> error_fields[] = 'password';
            $this -> message_fields[] = 'Заполните поле Пароль';

        }

    }


    public function getErrorMess(){

        $this->all_fields = [$this->error_fields,$this->message_fields];

        if (!empty($this->error_fields)) {
            $responce = [
                "status" => false,
                "type" => 1,
                "fields" => $this->all_fields

            ];
            echo json_encode($responce);
            die();
        }

    }





}