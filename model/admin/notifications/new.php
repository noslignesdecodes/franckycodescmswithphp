<?php
$title='Admin Notifications';
$header='view/users/mg/header/header.php';
$core='view/admin/notifications/notifications.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
 

$pagination=new AppPagination(ADMINROOT.'/files', 'page', 'xyz', $totalFiles);

 
include ADMIN_PANEL_TEMPLATE;
 
