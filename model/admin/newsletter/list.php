		
		 
 <?php
$title='Admin News Letter';
$header='view/users/mg/header/header.php';
$core='view/admin/newsletter/list.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
$description='add description here';

$someMenu='view/users/mg/somemenu.php'; 


$totalEmail=$db->query('SELECT COUNT(id) qTotal FROM news_letter', false,[],true,true)['qTotal'];

$pagination=new AppPagination(ADMINROOT.'/newsletter', 'page', 'xyz', $totalEmail);

$email=$db->query('SELECT * FROM news_letter ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(), false,[],true);

include ADMIN_PANEL_TEMPLATE;
?>
	