<?php


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {


    session_start();
    include "../classes/registrashionUser.php";
    include "../classes/CRUD.php";



    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $all_res = [
        'full_name'=>$full_name,
        'email'=>$email,
        'login'=>$login,
        'password'=>$password
    ];


    $validate = new SignUpContr();
    $validate->validateFullname($full_name);
    $validate->validateEmail($email);
    $validate->validateLogin($login);
    $validate->validatePassword($password);
    $validate->validateConfirmPassword($password, $confirm_password);
    $validate->getErrorMess();



    $crud_operation = new CRUDjson();
    $all_res['password'] = md5($all_res['password']);
    $resLog = $crud_operation ->uniquenessLogin($all_res);
    $resEmail = $crud_operation ->uniquenessEmail($all_res);

    if ($resLog and $resEmail){
        $crud_operation ->addNewUser($all_res);
        $crud_operation -> sendNoErrorCrudRegistr(); //успешная регистрация
    }else{
        $crud_operation ->getErrorMessCrud();
    }


}