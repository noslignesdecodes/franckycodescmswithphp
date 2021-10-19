 
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
include 'view/admin/mg/topbar/topbar.php';

include 'view/users/mg/banner/banner.php';
?>
 
<div id="site-container">
<?php 

include $core;
?>
</div>

<?php 
include 'view/users/mg/footer/footer.php';
?>
</div>
<?php 
 
include 'view/users/mg/js/js.php';
?>
 
</body>
</html>
