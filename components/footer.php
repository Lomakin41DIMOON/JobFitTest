<footer>
	<div class="container container_mobile">
		<div class="footer_line">
			<h1 class="logo">
				<a href="index.php"><span class="yellow">Job</span><span class="white">FitTest</span></a>
			</h1>
			<div class="nav_block">
				<?php
				if (isset($_COOKIE["session"])) {
					li2('Пройти тестирование', 'tests.php');
					li2('О приложении', 'about.php');
					li2('Справочный материал', 'info.php');
					li2('Результаты тестирования', 'result.php');
				} else {
					li2('Пройти тестирование', 'auth.php');
					li2('О приложении', 'auth.php');
					li2('Справочный материал', 'auth.php');
					li2('Результаты тестирования', 'auth.php');
					$_SESSION['message'] = 'Вы не авторизованны в системе, просим вас пройти авторизацию для пользования приложением!';
				}
				?>
			</div>
		</div>
	</div>
</footer>