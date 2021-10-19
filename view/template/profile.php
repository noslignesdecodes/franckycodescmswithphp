 
		<!DOCTYPE html>

<html>
<head>
<title><?php echo $title;?></title>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0;maximum-scale=1">
<?php 
include 'view/users/mg/css/css.php';
?>
</head>
<body>
	<div id="core">

<?php 
include 'view/users/'.$language.'/topbar/topbar.php';
?>
<div id="banner" style="display: none;"> 
</div>
<div id="site-container">
<div id="profileContainer" class="profileContainer">
<div id="cover">
<div id="mainTitle">
<a href="<?php echo WEBROOT.'profile/';?>">tongasoa <?php echo $mainUser->getName();?></a>
</div>
</div>
<?php 

	include 'view/users/'.$language.'/profile/profilemenubar.php';
	?>


<div id="mainContainer">
<?php 

include $core;
?>
</div>
</div>
</div>

<?php 
include 'view/users/'.$language.'/footer/footer.php';
?>
</div>
<?php 
 
include 'view/users/mg/js/js.php';
?>
 
</body>
</html>
