<?php
session_start();
require_once 'db/database.php';
if (!isset($_COOKIE["session"])){
	header("Refresh:0; url=auth.php");
}
?>

<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
	<?php require 'components/head.php'?>
	<title>JobFitTest - Тестирование</title>
</head>

<body>
	<?php require 'components/header.php';
	require 'components/nav.php'; ?>
	<main>
		<div class="container">
			<div class="tests_list">
				<a href="test.php">
					<div class="test_block">
						<div class="image-container">
							<img src="content/img/Без имени-2.png" alt="" class="test_icon">
							<div class="overlay-text">
								<h1>Пройти</h1>
							</div>
						</div>
						<h4 class="test_title white">Русский язык</h4>
						<div class="test_questions">
							<h4 class="white">10 Вопросов</h4>
						</div>
					</div>
				</a>
				<a href="test.php">
					<div class="test_block">
						<div class="image-container">
							<img src="content/img/Без имени-2.png" alt="" class="test_icon">
							<div class="overlay-text">
								<h1>Пройти</h1>
							</div>
						</div>
						<h4 class="test_title white">Русский язык</h4>
						<div class="test_questions">
							<h4 class="white">10 Вопросов</h4>
						</div>
					</div>
				</a>
				<a href="test.php">
					<div class="test_block">
						<div class="image-container">
							<img src="content/img/Без имени-2.png" alt="" class="test_icon">
							<div class="overlay-text">
								<h1>Пройти</h1>
							</div>
						</div>
						<h4 class="test_title white">Русский язык</h4>
						<div class="test_questions">
							<h4 class="white">10 Вопросов</h4>
						</div>
					</div>
				</a>
			</div>
		</div>
	</main>
    <?php require 'components/footer.php'?>
</body>

</html>