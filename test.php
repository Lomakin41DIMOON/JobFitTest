<?php
session_start();
require_once 'db/database.php';
if (!isset($_COOKIE["session"])) {
    header("Refresh:0; url=auth.php");
    $_SESSION['message'] = 'Вы не авторизованны в системе, или время сессии закончилось. Просим вас пройти авторизацию для пользования приложением!';
}
$id_theme = $_GET['theme']
?>

<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
    <?php require  'components/head.php' ?>
    <title>JobFitTest - Тестирование</title>
</head>

<body>
    <?php require 'components/header.php';
    require 'components/nav.php'; ?>
    <main>
        <div class="container">
            <form class="" action="check/check_test.php?id=<? echo $id_theme ?>" method="post">
                <?php
                $sql_question = "SELECT * FROM `table-question` WHERE `id-theme` = $id_theme";

                $result_question = $connect->query($sql_question);

                if ($result_question->num_rows > 0) {
                    $counter = 1;
                    while ($row_question = $result_question->fetch_assoc()) {

                        $id_question = $row_question["id-question"];
                        $text_question = $row_question["text-question"];

                        $sql_answer = "SELECT * FROM `table-answer` WHERE `id-question` = $id_question";

                        $result_answer = $connect->query($sql_answer);
                ?>
                        <div class="">
                            <h1 class="green">Вопрос №<? echo $counter ?></h1>
                            <h4 class="green"><? echo $text_question ?></h4>
                            <div class="answer_list">
                                <?php
                                while ($row_answer = $result_answer->fetch_assoc()) {
                                    if ($row_answer["id-question"] == $row_question["id-question"]) {
                                        $id_answer = $row_answer["id-answer"];
                                        $text_answer = $row_answer["text-answer"];
                                ?>
                                        <div class="answer"><input type="radio" name="question-<? echo $id_question ?>" value="<? echo $id_answer ?>"> <? echo $text_answer ?></div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                <?php
                        $counter++;
                    }
                }
                ?>
                <button type="submit">Закончить тест</button>
            </form>
        </div>

    </main>
    <?php require 'components/footer.php' ?>
</body>

</html>