<?php


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    session_start();
    require_once "connect.php";
    include "../classes/autorizationUser.php";
    include "../classes/CRUD.php";


    $login = $_POST['login'];
    $password = $_POST['password'];
    $all_res = [
        'login' => $login,
        'password' => $password
    ];

    $validateIn = new SignInContr();
    $validateIn->validateLogin($login);
    $validateIn->validatePassword($password);
    $validateIn->getErrorMess();


    $crud_operationAuth = new CRUDjson();
    $all_res['password'] = md5($all_res['password']);
    if ($crud_operationAuth->authorization($all_res)) {
        $crud_operationAuth->sendNoErrorCrudRegistr();
    } else {
        $crud_operationAuth->getErrorMessCrud();
    }
}


