<?php  
$title='Admin Files';
$header='view/users/mg/header/header.php';
$core='view/admin/files/files.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
 

$pagination=new AppPagination(ADMINROOT.'/files', 'page', 'xyz', $totalFiles);


$files=$db->query('SELECT * FROM appupload ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),false,[],true);

include ADMIN_PANEL_TEMPLATE;
