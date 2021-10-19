<?php
$title='update';
$header='view/users/mg/header/header.php';
$core='view/admin/update/update.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
$description='add description here';

$someMenu='view/users/mg/somemenu.php'; 

$app=$db->query('SELECT * FROM app',false,[],true,true);

if(gettype($app)=='boolean')
{
	$app['admin_key']='adminpanel';
	$app['app_name']='my blog';
}

 
include ADMIN_PANEL_TEMPLATE;
?>
						