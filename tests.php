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
	<title>JobFitTest - Тестирование</title>
</head>

<body>
	<?php require 'components/header.php';
	require 'components/nav.php'; ?>
	<main>
		<div class="container">
			<h1 class="green center">Выберете тему:</h1>
			<div class="tests_list">
				<?php
				$sql = "SELECT tt.*, COUNT(tq.`id-question`) AS `question-count`
				FROM `table-theme` tt
				LEFT JOIN `table-question` tq ON tt.`id-theme` = tq.`id-theme`
				GROUP BY tt.`id-theme`";

				$result = $connect->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$question_count = $row["question-count"];
						$id_theme = $row["id-theme"];
						$title_theme = $row["title-theme"];
						if ($row["icon-theme"] == NULL) {
							$icon_theme = 'test.png';
						} else {
							$icon_theme = $row["icon-theme"];
						}
						if ($question_count == 1) {
							$question_count = $question_count . ' Вопрос';
						} else {
							$question_count = $question_count . ' Вопросов';
						}
				?>
						<a href="test.php?theme=<? echo $id_theme ?>">
							<div class="test_block">
								<div class="image-container">
									<img src="content/img/<? echo $icon_theme ?>" alt="" class="test_icon">
									<div class="overlay-text">
										<h1>Пройти</h1>
									</div>
								</div>
								<h4 class="test_title white"><? echo $title_theme ?></h4>
								<div class="test_questions">
									<h4 class="white"><? echo $question_count ?></h4>
								</div>
							</div>
						</a>
				<?php

					}
				} else {
					echo '<h1 class="error">Упс... Кажется тесты отсутствуют. В скором времени они появятся.</h1>';
				}
				?>
			</div>
		</div>
	</main>
	<?php require 'components/footer.php' ?>
</body>

</html>