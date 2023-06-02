<nav>
	<div class="container container_mobile">
		<div class="back_img">
			<div class="nav_line">
				<?php
				if (isset($_COOKIE["session"])) {
					li('Пройти тестирование', 'content/img/free-icon-exam-4797050.png', 'tests.php');
					li('О приложении', 'content/img/free-icon-information-157933.png', 'about.php');
					li('Справочный материал', 'content/img/free-icon-open-book-166088.png', 'info.php');
					li('Результаты тестирования', 'content/img/free-icon-checklist-876749.png', 'result.php');
				} else {
					li('Пройти тестирование', 'content/img/free-icon-exam-4797050.png', 'auth.php');
					li('О приложении', 'content/img/free-icon-information-157933.png', 'auth.php');
					li('Справочный материал', 'content/img/free-icon-open-book-166088.png', 'auth.php');
					li('Результаты тестирования', 'content/img/free-icon-checklist-876749.png', 'auth.php');
					$_SESSION['message'] = 'Вы не авторизованны в системе, просим вас пройти авторизацию для пользования приложением!';
				}
				?>
			</div>
			<h3 class="title white title_mobile">Продемонстрируй свой профессиональный уровень с помощью тестирования</h3>
		</div>
	</div>
</nav>