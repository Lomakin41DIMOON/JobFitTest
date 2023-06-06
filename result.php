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
	<title>JobFitTest - Результаты</title>
</head>

<body>
	<?php require 'components/header.php';
	require 'components/nav.php'; ?>
	<main>
		<div class="container">
			<div class="result_block">
				<div class="result_blocks">
					<h1 class="green">Ваш последний результат:</h1>
					<?php
					if (isset($_COOKIE["result"])) {
						$encode_cookie = $_COOKIE["result"];
						$last_result = json_decode($encode_cookie, true);
					?>
						<h4 class="green">Наименование теста: <? echo $last_result['title-theme'] ?></h4>
						<h4 class="green">Баллы: <? echo $last_result['received-points'] ?> / <? echo $last_result['total-points'] ?></h4>
						<h4 class="green">Количество правильных ответов: <? echo $last_result['right-answers'] ?></h4>
						<h4 class="green">Количество допущенных ошибок:<? echo $last_result['wrong-answers'] ?></h4>
					<?php
					} else {
						echo '<h1 class="error block">Упс.. Кажется ваш последний результат куда-то потерялся.</h1>';
					}
					?>
				</div>
			</div>
		</div>
	</main>
	<?php require 'components/footer.php' ?>
</body>

</html>