<?php  
$title='Historique | Timeline';
$header='view/users/mg/header/header.php';
$core='view/timeline/timeline.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';





$pagination=new AppPagination(WEBROOT.'timeline/', 'page', 'perpage', $totalTimeline, '#profile');

$pagination->setPerPage(5);

$timeline=$db->query('SELECT * FROM historiques ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),false,[],true);


include 'view/template/page.php';
