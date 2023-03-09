<?php
class CRUDjson {

    public $fileJson = '../inc/DB.json';
    public $error_fields1 = [];
    public $message_fields1 = [];
    public $all_fields1 = [];






    public function addNewUser($POST)
    {
        if (file_exists($this ->fileJson)) {
            $openJson = file_get_contents($this->fileJson);
            $jsonArray = json_decode($openJson, true);
            $jsonArray [] = $POST;
            file_put_contents($this ->fileJson, json_encode($jsonArray));
    }
    }

    public function uniquenessLogin($POST)
    {
        if (file_exists($this ->fileJson)) {
            $openJson = file_get_contents($this ->fileJson);
            $jsonArray = json_decode($openJson, true);
            if (!empty($jsonArray)) {
                if (isset($POST['login'])) {
                    foreach ($jsonArray as $index => $log) {
                        if ($log['login'] == $POST['login']) {
                            $this->error_fields1[] = 'login';
                            $this->message_fields1[] = 'Такой логин уже существует';
                            return false;
                        }
                    }
                }
            } else {
                return true;
            }
        }
        return true;
    }
    public function uniquenessEmail($POST)
    {
        if (file_exists($this ->fileJson)) {
            $openJson = file_get_contents($this ->fileJson);
            $jsonArray = json_decode($openJson, true);
            if (!empty($jsonArray)) {
                if (isset($POST['email'])) {
                    foreach ($jsonArray as $index => $eml) {
                        if ($eml['email'] == $POST['email']) {
                            $this->error_fields1[] = 'email';
                            $this->message_fields1[] = 'Такой email уже существует';
                            return false;
                        }
                    }
                }
            } else {
                return true;
            }
        }
        return true;
    }

    public function authorization($POST)
    {
        if (file_exists($this ->fileJson)) {
            $openJson = file_get_contents($this ->fileJson);
            $jsonArray = json_decode($openJson, true);
            $a = 0;
            if (!empty($jsonArray)) {
                if (isset($POST['login'])) {
                    foreach ($jsonArray as $index  => $auth) {
                        if (($auth['login'] == $POST['login']) && ($auth['password'] == $POST['password'])) {
                            $_SESSION['user'] = [
                                "full_name" => $auth['full_name'],
                                "email" => $auth['email']
                            ];
                            setcookie("full_name", $auth['full_name'] , time() + 10000000, '/');
                            return true;
                        }
                        elseif ($auth['login'] == $POST['login'])
                        {
                            $this->error_fields1[] = 'password';
                            $this->message_fields1[] = 'Вы ввели неверно пароль';
                            $a = 1;

                        }
                        elseif ($auth['password'] == $POST['password']) {
                            $this->error_fields1[] = 'login';
                            $this->message_fields1[] = 'Вы ввели неверно логин';
                            $a = 1;
                        }

                    }
                    if ($a == 0) {
                        $this->error_fields1[] = 'login';
                        $this->message_fields1[] = 'Вы ввели неверно логин';
                        $this->error_fields1[] = 'password';
                        $this->message_fields1[] = 'Вы ввели неверно пароль';
                        return false;
                    }

                }
            } else {
                $this->error_fields1[] = 'login';
                $this->message_fields1[] = 'Вы ввели неверно логин';
                $this->error_fields1[] = 'password';
                $this->message_fields1[] = 'Вы ввели неверно пароль';
                return false;
            }

        }

        return false;
    }

    public function getErrorMessCrud(){

        $this->all_fields1 = [$this->error_fields1,$this->message_fields1];

        if (!empty($this->error_fields1)) {
            $responce = [
                "status" => false,
                "type" => 1,
                "fields" => $this->all_fields1

            ];
            echo json_encode($responce);
            die();
        }

    }

    public function sendNoErrorCrudRegistr() {
        $responce = [
            "status" => true,
        ];
        echo json_encode($responce);
    }













}
