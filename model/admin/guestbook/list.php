<?php
$title='Admin Guest Book';
$header='view/users/mg/header/header.php';
$core='view/admin/guestbook/list.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
$description='add description here';

$someMenu='view/users/mg/somemenu.php'; 


$totalGBook=$db->query('SELECT COUNT(id) qTotal FROM guest_book', false,[],true, true)['qTotal'];

$pagination=new AppPagination(ADMINROOT.'/guestbook', 'page', 'xyz', $totalGBook);

$all=$db->query('SELECT * FROM guest_book ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(), false,[],true);

include ADMIN_PANEL_TEMPLATE;
 
					