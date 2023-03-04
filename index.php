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
        <label>Логин</label>
        <input type="text" name="login"  placeholder="Введите ваш логин">
        <p class="msg none" name = "login"> Ошибка</p>
        <label>Пароль</label>
        <input type="password" name ="password" placeholder="Введите ваш пароль">
        <p class="msg none" name = "password"> Ошибка</p>
        <button type="submit" class="login-button script">Войти</button>
        <p>
            Вы еще не зарегистрованы? <a href="registr.php">Нажмите!</a>
        </p>

        <p class="msg none">Test</p>
        <noscript><p class="msg noscript">Включите JavaScript </p></noscript>
    </form>


    <script src="assets/js/jquery-3.6.3.js"></script>
    <script src="assets/js/main.js"></script>
    <style>.script{display:none;}</style>
    <script type="text/javascript" >
        document.write('<style>.noscript{display:none;} .script{display:inherit;} </style>');
    </script>

</body>
</html>

