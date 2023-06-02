<?php
session_start();
require_once '../db/database.php';

$login = $_POST['login'];
$password = $_POST['password'];
$check_user = mysqli_query($connect, "SELECT * FROM `table-user` WHERE `login` = '$login' AND `password` = '$password'");
if ($login != NULL) {
    if ($password != NULL) {
        if (mysqli_num_rows($check_user) > 0) {
            $user = mysqli_fetch_assoc($check_user);
            $user_id = $user['id-user'];
            setcookie("session", $user_id, time() + 3600, "/", "localhost2", false, true);
            header('Location: ../index.php');
        } else {
            $_SESSION['message'] = 'Неверный логин или пароль';
            header('Location: ../auth.php');
        }
    } else {
        $_SESSION['message'] = 'Поле пароль пусто';
        header('Location: ../auth.php');
    }
} else {
    $_SESSION['message'] = 'Поле логин пусто';
    header('Location: ../auth.php');
}
