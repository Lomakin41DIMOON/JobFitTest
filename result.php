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
	<title>JobFitTest - Результаты</title>
</head>
<body>
	<?php require 'components/header.php';
	require 'components/nav.php'; ?>
	<main>
		<div class="container">
		</div>
	</main>
    <?php require 'components/footer.php'?>
</body>
</html>