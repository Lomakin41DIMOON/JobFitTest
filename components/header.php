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
			<a href="auth.php">
				<img src="content/icons/login1.png" alt="Вход">
			</a>
		</button>
	</div>
	<script>
		$(".burger").click(function() {
			$("nav").toggleClass("nav_bar_YES");
			$(".burger").toggleClass("burgerClose");
		});
	</script>
</header>