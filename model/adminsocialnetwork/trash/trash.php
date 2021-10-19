<?php
$title='Admin trash';
$header='view/users/mg/header/header.php';
$core='view/admin/trash/trash.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
$description='add description here';

$someMenu='view/users/mg/somemenu.php'; 

$totalFiles=0;
$pagination=new AppPagination(ADMINROOT.'/trash/', 'page', 'xyz', $totalFiles);

 
include ADMIN_PANEL_TEMPLATE;

