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
            $info = mysqli_query($connect, "SELECT `title-post`,`title-department` FROM `table-post`, `table-department` WHERE `id-post` IN (SELECT `id-post` FROM `table-user` WHERE `id-user` = '$user_id') AND `id-department` IN (SELECT `id-department` FROM `table-user` WHERE `id-user` = '$user_id')");
            $info_user = mysqli_fetch_assoc($info);
            $fio = $user['surname'] . " " . $user['name'] . " " . $user['patronymic'];
            setcookie("session", "$user_id", time() + 3600);
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
