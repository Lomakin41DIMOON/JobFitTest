<?php
session_start();
require_once 'db/database.php';
?>

<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
	<?php require 'components/head.php'?>
	<title>JobFitTest - О приложении</title>
</head>

<body>
	<?php require 'components/header.php';
	require 'components/nav.php'; ?>
	<main>
		<div class="container">
			<div class="about_block">
				<h4 class="about_title green">JobFitTest - это веб-приложение, разработанное
					для тестирования и оценки компетенций сотрудников Федеральной
					таможенной службы Российской Федерации (ФТС). Это приложение
					предназначено для помощи HR-отделам и руководителям в
					проведении тестирования сотрудников и оценки их профессиональных
					навыков.</h4>
				<h4 class="about_title green">JobFitTest обладает несколькими важными функциями,
					такими как:</h4>
			</div>
			<img src="content/img/3.png" alt="" class="about_img">
			<div class="about_block">
				<h4 class="about_title green">Пройти тестирование</h4>
				<h4 class="green">При выборе функции "Пройти тестирование",
					пользователь попадает на страницу, где может пройти
					тестирование на знание определенных навыков и компетенций.
					На этой странице будет доступна форма, где пользователь
					может ввести свои данные, выбрать тест, который он хочет
					пройти, и начать тестирование.</h4>
			</div>
			<div class="about_block">
				<h4 class="about_title green">О приложении</h4>
				<h4 class="green">При выборе функции "О приложении", пользователь
					попадает на страницу, где может ознакомиться с
					информацией о приложении JobFitTest. На этой странице
					будет представлена общая информация о том, что это
					за приложение, для каких целей оно используется и
					какие возможности предоставляет.</h4>
			</div>
			<div class="about_block">
				<h4 class="about_title green">Справочный материал</h4>
				<h4 class="green">При выборе функции "Справочный материал",
					пользователь попадает на страницу, где может ознакомиться
					с дополнительной информацией по темам, которые
					охватываются тестами в приложении. На этой странице будут
					представлены статьи, видеоуроки и другие материалы,
					которые помогут пользователю лучше подготовиться к
					тестированию.</h4>
			</div>
			<div class="about_block">
				<h4 class="about_title green">Результаты тестирования</h4>
				<h4 class="green">При выборе функции "Результаты тестирования",
					пользователь попадает на страницу, где может увидеть свои
					результаты тестирования. На этой странице будут
					представлены подробные результаты каждого пройденного
					теста, а также общая статистика по всем тестам.</h4>
			</div>
			<div class="about_block">
				<h4 class="about_title green">Личный кабинет</h4>
				<h4 class="green">Пользователь может войти в свой личный
					кабинет, где будет доступна информация о его профиле,
					прошедших тестах и результаты тестирования. Для входа
					в личный кабинет пользователь должен использовать
					свои учетные данные, которые были созданы при
					регистрации в приложении.</h4>
			</div>
		</div>
	</main>
    <?php require 'components/footer.php'?>
</body>

</html>