<header>
	<div class="container heder_mobile flex">
		<div class="burger" id="burger">
			<samp></samp>
			<samp></samp>
			<samp></samp>
		</div>
		<div class="logo">
			<a href="index.php"><span class="yellow">Job</span><span class="green">FitTest</span></a>
		</div>
		<button class="auth cover">
			<?php
				if (isset($_COOKIE["session"])) {
					auth('profile.php', 'content/icons/login1.png', 'профиль');
				} else {
					auth('auth.php', 'content/icons/login1.png', 'вход');
				}
			?>
		</button>
	</div>
	<script>
		$(".burger").click(function() {
			$("nav").toggleClass("nav_bar_YES");
			$(".burger").toggleClass("burgerClose");
		});
	</script>
</header>