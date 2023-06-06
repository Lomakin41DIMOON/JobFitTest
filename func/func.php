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
function li2($title, $link)
{
	echo "<div class='beer'>
	<a href='$link'>
		<h2 class='white'>$title</h2>
	</a>
</div>";
}
function auth($link, $img, $alt)
{
    echo
    "<a href='$link'>
        <img src='$img' alt='$alt'>
    </a>";
}
