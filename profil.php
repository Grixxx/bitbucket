<?php
session_start();
if (!$_SESSION['user'] and !$_COOKIE['full_name']) {
    header('Location: index.php');
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

    <form>
        <h2>Hello! <?=$_COOKIE['full_name'] ?>. Как твои дела?</h2>
        <a href="#" ><?=$_SESSION['user']['email'] ?> </a>
        <a href="inc/exit.php" class="exit">Выход</a>
    </form>




</body>
</html>
