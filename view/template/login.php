<!DOCTYPE html>

<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT;?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT;?>css/bootstrap/css/bootstrap.min.js">

	<?php 
	//include 'view/users/mg/css/css.php';
	?>
</head>
<body>
	<div id="core">
		<?php 
			// include 'view/header/header.php';
		?>
		<?php 
		 
		//include 'view/users/mg/topbar/topbar.php';
		//include 'view/users/mg/banner/banner.php';
		?>
		 
		 
		<div id="site-container">
			<?php 

				include $core;
			?>
		</div>

		<?php 
			// include 'view/footer/footer.php';
		?>
		</div>
		<?php 
		 
		include 'view/js/js.php';
		?>

</body>
</html>
