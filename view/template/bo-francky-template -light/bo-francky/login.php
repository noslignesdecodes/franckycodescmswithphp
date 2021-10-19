<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/css/app.css';?>">
	<meta charset="utf-8"> 
</head>
<body>
	 
	<div class="appCore">
		<?php 
		include $core;

		 ?>
	</div>
 
	<script src="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/js/PhpChat.js';?>"></script>
	<script src="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/js/simplecmseditorbyfrancky/editor.js';?>"></script>

	<script src="<?php echo WEBROOT.'js/app.js';?>"></script>
	<script src="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/js/app.js';?>"></script>
</body>
</html>