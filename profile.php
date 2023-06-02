<?php
session_start();
require_once 'db/database.php';

if (isset($_COOKIE["session"])) {
	$user_id = $_COOKIE["session"];

	$sql = "SELECT u.*, d.`title-department`, p.`title-post` FROM `table-user` u JOIN `table-department` d ON u.`id-department`
 = d.`id-department` JOIN `table-post` p ON u.`id-post` = p.`id-post` WHERE u.`id-user` = $user_id";

	$result = $connect->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$user_name = $row["name"];
			$user_surname = $row["surname"];
			$user_patronymic = $row["patronymic"];
			$user_department = $row["title-department"];
			$user_post = $row["title-post"];
		}
	}
	$fio = $user_surname . " " . $user_name . " " . $user_patronymic;
} else {
	header("Refresh:0; url=auth.php");
}
?>

<!DOCTYPE html>
<html lang=ru dir="ltr">

<head>
	<?php require 'components/head.php' ?>
	<title>JobFitTest - Личный кабинет: <? echo $fio ?></title>
</head>

<body>
	<?php require 'components/header.php';
	require 'components/nav.php'; ?>
	<main>
		<div class="container">
			<div class="profile_block">
				<div class="profile_blocks">
					<h1 class="green">ФИО:</h1>
					<h4 class="green"><? echo $fio ?></h4>
				</div>
				<div class="profile_blocks">
					<h1 class="green">Отдел:</h1>
					<h4 class="green"><? echo $user_department ?></h4>
				</div>
				<div class="profile_blocks">
					<h1 class="green">Должность:</h1>
					<h4 class="green"><? echo $user_post ?></h4>
				</div>
				<div class="profile_blocks">
					<h1 class="green">Должность:</h1>
					<h4 class="green"><? echo $user_post ?></h4>
				</div>
			</div>
			<table>
				<tr>
					<th>Название</th>
					<th>Статус</th>
					<th>Баллы</th>
				</tr>
				<?php
				$sql2 = "SELECT tr.`id-result`, tr.`id-user`, tr.`id-theme`, tt.`title-theme`, SUM(tq.`ball-question`) AS `total-ball`, tr.`number-balls`
				FROM `table-result` tr
				JOIN `table-theme` tt ON tr.`id-theme` = tt.`id-theme`
				JOIN `table-question` tq ON tr.`id-theme` = tq.`id-theme`
				WHERE tr.`id-user` = $user_id
				GROUP BY tr.`id-result`, tr.`id-user`, tr.`id-theme`, tt.`title-theme`, tr.`number-balls`";	   
				$result2 = $connect->query($sql2);
				
				if ($result2->num_rows > 0) {
					while ($row = $result2->fetch_assoc()) {
						$passingPercentage = 0.8;
						if ($row["number-balls"] >= $passingPercentage * $row["total-ball"]) {
							$status = "Пройден";
						} else {
							$status = "Не пройден";
						}
						?>
						<tr>
							<td><?php echo $row["title-theme"]; ?></td>
							<td><?php echo $status; ?></td>
							<td><?php echo $row["number-balls"] . "/" . $row["total-ball"]; ?></td>
						</tr>
						<?php
					}
				} else {
					echo '<h1 class="error">Упс... Кажется у вас нету результатов!</h1>';
				}
				
				?>
			</table>
		</div>
	</main>
	<?php require 'components/footer.php' ?>
</body>

</html>