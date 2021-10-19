<?php 
use franckycodes\database\LightDb;
$title='Home sns';

$core='view/socialnetwork/home/home.php';

$db=new LightDb();
$membersPosts=$db->query('SELECT * FROM app_users_posts ORDER BY id DESC ',false,[],true);
$totalPosts=$db->query('SELECT COUNT(id) qTotal FROM app_users_posts',false,[],true,true)['qTotal'];
 

include MAIN_TEMPLATE;