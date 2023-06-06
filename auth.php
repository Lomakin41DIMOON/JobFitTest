<?php
session_start();
require_once 'db/database.php';
?>

<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
    <?php require 'components/head.php' ?>
    <title>JobFitTest - Авторизация</title>
</head>

<body>
    <div class="auth_bg">
        <div class="container">
            <form method="post" action="check/auth_check.php" class="auth_form">
                <h1 class="green">Вход в систему</h1>
                <div class="auth_block">
                    <Label class="green">Логин</Label>
                    <div class="input_block">
                        <img src="content/icons/login4.png">
                        <div class="auth_input">
                            <input type="text" name="login" placeholder="Логин">
                        </div>
                    </div>
                </div>
                <div class="auth_block">
                    <Label class="green">Пароль</Label>
                    <div class="input_block">
                        <img src="content/icons/free-icon-lock-4671568.png">
                        <div class="auth_input">
                            <input type="password" name="password" placeholder="Пароль">
                        </div>
                    </div>
                </div>
                <button class="auth_block" type="submit">Войти</button>
                <div class="auth_block line"></div>
                <?php
                if (isset($_SESSION['message'])) {
                    echo '<Label class="error">' . $_SESSION['message'] . '</Label>';
                }
                unset($_SESSION['message']);
                ?>
            </form>
        </div>
    </div>
</body>

</html>