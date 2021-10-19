<!DOCTYPE html>
<html lang="en"> 
	<head>
		<title>my great social network</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<meta charset="utf-8">
		<link rel="stylesheet" href="/css/app.css">
		<style>
			body{

			}
		</style>
	</head>
	<body>
		<header class="appHeader"> 
			<nav>
				<ul>
					<li><a href="<?php echo WEBROOT.'login/';?>">Login</a></li> 
					<li><a href="<?php echo WEBROOT.'subscribe/';?>">Subscribe</a></li>
				</ul>
			</nav>
		</header>

		<?php 
		    include $core;
		?>

		<footer class="appFooter">
			<p>Copyright &copy; 2021. All rights reserved!</p>
		</footer>
	</body>
</html>