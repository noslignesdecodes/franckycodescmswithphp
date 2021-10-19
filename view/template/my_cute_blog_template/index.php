<!DOCTYPE html>
<html lang="mg">
<head>
<title>My cute blog template</title>
<meta charset="utf-8">
<meta name="description" content="Cute blog template franckycodescms">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<style>
	<?php 
		include 'css/app.css';
	?>

</style>
<style>
	a:link, a:visited
	{
		color: #808080;
	}
	#mainMenu li 
	{
		display: inline-block;
		vertical-align: top;
		height: 50px;
		min-height: 50px;
		list-style-type: none;
	}
	#mainMenu li a:link, #mainMenu li a:visited; 
	{
		display: block;
		min-height: 50px;
		height: 50px;
		min-width: 50px;
		line-height: 3;
		color: #808080;
	}
	#mainMenu li a:hover
	{
		color: #000;
	}
	.greenText
	{
		color: #7ED097;
	}
	h1 
	{
		color: #7ED097;
	}
</style>
</head>
<body>

	<div class="b7 alignCenter centerBox"><br><br><br>
		<h1>welcome to my cute blog template</h1><br><br><br>
		<nav id="mainMenu" >
			<ul  >
			<li><a href="#">home</a></li>
			<li><a href="#">blog</a></li>
			<li><a href="#">portfolio</a></li>
			<li><a href="#">shop</a></li>
			<li><a href="#">contact</a></li>
			<li><a href="#">about</a></li>
			<li><a href="#">services</a></li>

			</ul>
		</nav>
		<p>This is a simple blog template for franckycodes cms</p><br>
		<div class="alignCenter">
			<a href="#" class="greenBt">cute</a>
		</div>
	</div>

	<div class="appCore">
		<?php 
			include $core;
		?>
	</div>
	<script>
		
		function app(){

		}
		(function(){

		})();
	</script>
</body>
</html>