<?php
session_start();
unset($_SESSION['user']);
setcookie('full_name', '', time() - 10000000);
header('Location: ../index.php');
