<?php
    session_start();
    if ($_SESSION['user'] and $_COOKIE['full_name']) {
        header('Location: profil.php');
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <form >
        <label>Имя</label>
        <input type="text" name = "full_name"  placeholder="Введите ваше имя на английском">
        <p class="msg none" name = "full_name"> Ошибка</p>
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите вашу почту">
        <p class="msg none" name = "email"> Ошибка</p>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите ваш логин на английском">
        <p class="msg none" name = "login"> Ошибка</p>
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите ваш пароль на английском">
        <p class="msg none" name = "password"> Ошибка</p>
        <label>Подтверждение пароля</label>
        <input type="password" name="confirm_password" placeholder="Подтвердите пароль">
        <p class="msg none" name = "confirm_password"> Ошибка</p>
        <button type="submit" class="registr-button script">Зарегистрироваться</button>
        <p>
            Вы уже зарегистрированы? <a href="index.php">Нажмите!</a>
        </p>



    </form>

    <script src="assets/js/jquery-3.6.3.js"></script>
    <script src="assets/js/main.js"></script>
    <style>.script{display:none;}</style>
    <script type="text/javascript" >
        document.write('<style>.noscript{display:none;} .script{display:inherit;} </style>');
    </script>

</body>
</html>
