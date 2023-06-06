<?php
require_once '../db/database.php';

if(isset($_FILES['file'])) {
  $file_name = $_FILES['file']['name'];
  $file_size = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];
  $file_ext = strtolower(end(explode('.', $file_name)));
  $allowed_ext = array('xlsx');

  // Проверка существования файла
  $file_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $file_name;

  if (in_array($file_ext, $allowed_ext) === false) {
    die("Неверный тип файла. Допустимые расширения: " . implode(',', $allowed_ext));
  }

  if ($file_size > 2097152) {
    die('Файл должен быть не более 2 Мб');
  }

  move_uploaded_file($file_tmp, $file_path);

  if (!file_exists($file_path)) {
    die("Файл не найден: " . $file_path);
  }

  require_once $_SERVER['DOCUMENT_ROOT']."/Classes/PHPExcel/IOFactory.php";
  $objPHPExcel = PHPExcel_IOFactory::load($file_path);

  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();

    for ($row = 3; $row <= $highestRow; $row++) { // обходим все строки

      $cell1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue(); //Название темы
      $cell2 = $worksheet->getCellByColumnAndRow(2, $row)->getValue(); //Текст вопроса
      $cell3 = intval($worksheet->getCellByColumnAndRow(3, $row)->getValue()); //Кол-во баллов
      $cell4 = $worksheet->getCellByColumnAndRow(4, $row)->getValue(); //Текст ответа
      $cell5 = $worksheet->getCellByColumnAndRow(5, $row)->getValue(); //Тип вопроса (0/1)

      if (!empty($cell1)) {
        $theme_name = mysqli_real_escape_string($connect, $cell1); // Экранируем данные для безопасности
        $sql1 = "INSERT INTO `table-theme` (`id-theme`, `title-theme`, `icon-theme`) VALUES (NULL, '$theme_name', NULL)";
        $query1 = mysqli_query($connect, $sql1) or die('Ошибка чтения записи: '.mysqli_error($connect));
        $theme_id = mysqli_insert_id($connect);
      }

      if (!empty($cell2) && !empty($cell3)) {
        $question_text = mysqli_real_escape_string($connect, $cell2); // Экранируем данные для безопасности
        $sql2 = "INSERT INTO `table-question` (`id-question`, `id-theme`, `text-question`, `ball-question`) VALUES (NULL, '$theme_id', '$question_text', '$cell3')";
        $query2 = mysqli_query($connect, $sql2) or die('Ошибка чтения записи: '.mysqli_error($connect));
        $question_id = mysqli_insert_id($connect);
      }

      if (!empty($cell4)) {
        $type = !empty($cell5) ? 1 : 0;
        if (empty($question_id)) {
          // Проверяем наличие вопроса с таким текстом
          $question_text = mysqli_real_escape_string($connect, $cell2);
          $sql_check_question = "SELECT `id-question` FROM `table-question` WHERE `text-question` = '$question_text' LIMIT 1";
          $result_check_question = mysqli_query($connect, $sql_check_question);
          if (mysqli_num_rows($result_check_question) > 0) {
            $row_question = mysqli_fetch_assoc($result_check_question);
            $question_id = $row_question['id-question'];
          }
        }
        if (!empty($question_id)) {
          $answer_text = mysqli_real_escape_string($connect, $cell4); // Экранируем данные для безопасности
          $sql3 = "INSERT INTO `table-answer` (`id-answer`, `id-question`, `text-answer`, `type-answer`) VALUES (NULL, '$question_id', '$answer_text', '$type')";
          $query3 = mysqli_query($connect, $sql3) or die('Ошибка чтения записи: '.mysqli_error($connect));
        }
      }
    }
  }
}
header('Location: ../admpanel.php');
unlink($file_path);
