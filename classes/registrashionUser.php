<?php

class SignUpContr {

    public $error_fields = [];
    public $message_fields = [];
    public $all_fields = [];





    public function validateFullname($full_name){

        if (!ctype_alpha($full_name) || strlen($full_name ) < 2 ||  $full_name === '') {
            $this -> error_fields[] = 'full_name';
            $this -> message_fields[] = 'Введите только буквы (мин 2 символа) на английском и без пробелов';

        }

    }
    public function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $email === '') {
            $this -> error_fields[] = 'email';
            $this -> message_fields[] = 'Введите правильно почту (с @)';

        }

    }
    public function validateLogin($login){
        if (strlen($login) < 6 || !ctype_graph($login) || $login === '') {
            $this -> error_fields[] = 'login';
            $this -> message_fields[] = 'Введите больше 6 символов без пробелов и на английском';

        }

    }
    public function validatePassword($password){
        if (!ctype_alnum($password) || strlen($password) < 6 || $password === '') {
            $this -> error_fields[] = 'password';
            $this -> message_fields[] = 'Введите пароль на английском не менее 6 символов без пробелов (можно использовать цифры)';

        }

    }
    public function validateConfirmPassword($password, $confirm_password){
        if($password !== $confirm_password || $confirm_password === ''){
            $this -> error_fields[] = 'confirm_password';
            $this -> message_fields[] = 'Ваши пароли не совпадают';

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
