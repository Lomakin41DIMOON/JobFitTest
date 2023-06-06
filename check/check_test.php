<?php
session_start();
require_once '../db/database.php';

$id_user = $_COOKIE["session"]; //ID пользователя проходящего тест
$id_theme = $_GET['id']; //ID темы по методу GET
$total_points = 0; //Всего баллов зп тест
$received_points = 0; //Число полученных баллов за тест

$right_answers = 0;
$wrong_answers = 0;


$sql = "SELECT * FROM `table-question` WHERE `id-theme` = $id_theme";

$result = $connect->query($sql);

while ($row = $result->fetch_assoc()) {

    $id_question = $row['id-question']; //Получаем ID Вопроса
    $ball_question = $row['ball-question']; //Получаем баллы за Вопрос
    $id_answer = $_POST['question-'.$id_question]; //Получаем из метода POST ID Ответа

    $total_points+= $ball_question;

    $sql2 = "SELECT `type-answer` FROM `table-answer` WHERE `id-answer` = $id_answer"; //Делаем выборку из БД по ID Ответа
    $result2 = $connect->query($sql2);

    while ($row2 = $result2->fetch_assoc()) {

        $type_answer = $row2['type-answer']; //Получаем тип Ответа

        if ($type_answer == '1'){ //Проверяем правильный ли Ответ или нет
            $received_points += $ball_question; //Если да, то добавляем баллы к итогу
            $right_answers++ ;
        } else {
            $wrong_answers++ ;
        }
    }
}

$sql3 = "SELECT `title-theme` FROM `table-theme` WHERE `id-theme` = $id_theme";
$result3 = $connect->query($sql3);
while ($row3 = $result3->fetch_assoc()) {
    $title_theme = $row3['title-theme'];
}

$last_result = array(
    'title-theme' => $title_theme,
    'total-points' => $total_points,
    'received-points' => $received_points,
    'right-answers' => $right_answers,
    'wrong-answers' => $wrong_answers
);

$cookieValue = json_encode($last_result);

setcookie("result", $cookieValue, 0, "/", "jobfittest", false, true);

mysqli_query($connect, "INSERT INTO `table-result` (`id-theme`, `id-user`, `number-balls`) VALUES ('$id_theme', '$id_user', '$received_points')");

header('Location: ../result.php');
?>