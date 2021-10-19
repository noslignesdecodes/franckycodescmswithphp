<?php  
$title='Promotions'; 
$core='view/promotions/promotions.php';


$totalPromo=(int)$db->query('SELECT COUNT(id) qTotal FROM actus WHERE en_promo',false,[],true,true)['qTotal'];
$pagination=new AppPagination(WEBROOT.'promotions/', 'page', 'pp', $totalPromo);

$pagination->setPerPage(10);
$promotions=$db->query('SELECT * FROM actus WHERE en_promo ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(), false,[],true);


include MAIN_TEMPLATE;
