<?php  
$title='Admin articles';
$header='view/users/mg/header/header.php';
$core='view/admin/articles/articles.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
 

$pagination=new AppPagination(ADMINROOT.'/articles/', 'page', 'pp', $totalArticles);

// echo $pagination->getStart().' '.$pagination->getPerPage();
$articles=$db->query('SELECT * FROM actus ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),false,[],true);



include ADMIN_PANEL_TEMPLATE;
