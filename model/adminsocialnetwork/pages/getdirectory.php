<?php
$title='All directory';
$header='view/users/mg/header/header.php';
$core='view/admin/pages/getdirectory.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
$description='add description here';

$someMenu='view/users/mg/somemenu.php'; 

$pagination=new AppPagination(ADMINROOT.'/files', 'page', 'xyz', $totalFiles);

 
include ADMIN_PANEL_TEMPLATE;
 
