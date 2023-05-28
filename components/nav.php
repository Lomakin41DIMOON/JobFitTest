<nav>
	<div class="container container_mobile">
		<div class="back_img">
			<div class="nav_line">
				<?php
				li('Пройти тестирование', 'content/img/free-icon-exam-4797050.png', 'tests.php');
				li('О приложении', 'content/img/free-icon-information-157933.png', 'about.php');
				li('Справочный материал', 'content/img/free-icon-open-book-166088.png', 'info.php');
				li('Результаты тестирования', 'content/img/free-icon-checklist-876749.png', 'result.php'); ?>
			</div>
			<h3 class="title white title_mobile">Продемонстрируй свой профессиональный уровень с помощью тестирования</h3>
		</div>
	</div>
</nav>
<?php
function li($title, $img, $link)
{
	echo "<div class='beer'>
	<a href='$link'>
		<div class='nav_icon'>
			<img src='$img' alt='Иконка $title'>
		</div>
		<h2 class='white'>$title</h2>
	</a>
</div>";
}
