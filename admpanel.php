<?php
session_start();
require_once 'db/database.php';
if (!isset($_COOKIE["session"])) {
    header("Refresh:0; url=auth.php");
    $_SESSION['message'] = 'Вы не авторизованны в системе, или время сессии закончилось. Просим вас пройти авторизацию для пользования приложением!';
}
?>

<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
    <?php require 'components/head.php' ?>
    <title>JobFitTest - Admin Panel</title>
</head>

<body>
    <?php require 'components/header.php';
    require 'components/nav.php'; ?>
    <main>
        <div class="container">
            <div class="adm_block">
                <form action="add/add_test.php" method="post" enctype="multipart/form-data">
                    <h1 class="green">Загрузка тестов</h1>
                    <label class="file-input" for="file-input">Выберите файл:</label>
                    <input type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" multiple="false">
                    <button type="submit">Загрузить</button>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<Label class="error">' . $_SESSION['message'] . '</Label>';
                    }
                    unset($_SESSION['message']);
                    ?>
                </form>
            </div>
        </div>
    </main>
    <?php require 'components/footer.php' ?>
</body>

</html>