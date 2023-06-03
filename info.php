<?php
session_start();
require_once 'db/database.php';
if (!isset($_COOKIE["session"])){
	header("Refresh:0; url=auth.php");
	$_SESSION['message'] = 'Вы не авторизованны в системе, или время сессии закончилось. Просим вас пройти авторизацию для пользования приложением!';
}
?>

<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
	<?php require 'components/head.php'?>
	<title>JobFitTest - Справочный материал</title>
</head>

<body>
	<?php require 'components/header.php';
	require 'components/nav.php'; ?>
	<main>
		<div class="container">
			<h3 class="info_title green">Справочный материал</h3>
			<div class="info">
				<div class="info_block">
					<h4 class="white">79 ФЗ «О государственной гражданской службе
						Российской Федерации»</h4>
				</div>
				<div class="info_block">
					<h4 class="white">79 ФЗ «О государственной гражданской службе
						Российской Федерации»</h4>
				</div>
				<div class="info_block">
					<h4 class="white">79 ФЗ «О государственной гражданской службе
						Российской Федерации»</h4>
				</div>
				<div class="info_block">
					<h4 class="white">79 ФЗ «О государственной гражданской службе
						Российской Федерации»</h4>
				</div>
			</div>
		</div>
	</main>
    <?php require 'components/footer.php'?>
</body>

</html>