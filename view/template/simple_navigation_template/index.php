<!DOCTYPE html>
<html>
<head lang="fr">

	<title>Simple template by francky</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo WEBROOT.'view/template/simple_navigation_template/';?>css/app.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
<div class="mainContainer">
    <nav class="appTopMenu"> 
		<ul>
			<li><a href="#">Menu 1</a></li>
			<li><a href="#">Menu 2</a></li>
			<li><a href="#">Menu 3</a></li>
		</ul>
	</nav>
	<div class="appMainBt">
	    <div></div>
		<div></div>
		<div></div>
	</div>
	<header class="appMainHeader">
	
	<h1>Mon site</h1>
	<nav class="appMainMenu">
	<ul>
	    <li><a href="#">Accueil</a></li>
		<li><a href="<?php echo WEBROOT.'contact/';?>">Contact</a></li>
		<li><a href="#">Menu 6</a></li>
		<li><a href="#">Menu 7</a></li>
	</ul>
	</nav>
	</header> 
	<div class="appBanner">
	<h1>Nom site</h1>
	<div class="bannerLine">
	</div>
	</div>
	<div class="appCore">
	    <?php 
	    include $core;
	    ?>
	</div>
	<footer class="appMainFooter">
	<div>
	<h2>Nom site</h2>
	<p>Description site</p>
	<div>
	Liens reseaux
	</div>
	</div>
	<div>
	<h2>Nom site</h2>
	<p>Lorem ipsum dolor 1</p>
	<p>Lorem ipsum dolor 2</p>
	<p>Lorem ipsum dolor 3</p>
	</div>
	<div>
	<h2>Menu</h2>
	Lorem <br>
	Lorem <br>
	</div>
	<div>
	<h2>lorem</h2>
	lorem
	</div>
	
	</footer> 
</div>
</body>
</html>