<?php
use franckycodes\database\LightDb;
$title='Admin all templates';
$header='view/users/mg/header/header.php';
$core='view/admin/templates/all.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
 
$totalTemplates=$db->query('SELECT COUNT(id) qTotal FROM appupload  WHERE is_template ORDER BY id DESC',false,[],true,true)['qTotal'];
$templates=$db->query('SELECT * FROM appupload  WHERE is_template ORDER BY id DESC',false,[],true);




//if(!$totalTemplates)
//{
$totalInstalledTemplates=$db->query('SELECT COUNT(id) qTotal FROM app_templates ',false,[],true,true)['qTotal'];

$pagination=new AppPagination(ADMINROOT.'templates/', 'page', 'pp', $totalInstalledTemplates);

$pagination->setPerPage(50);
$installedTemplates=$db->query('SELECT * FROM app_templates ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(), false,[],true);


//}



function isInstalled($fileId)
{
	$db=new LightDb();
	$template=new AppFile($fileId);
	$check=$db->query('SELECT * FROM app_templates WHERE file_id=:qId',true, 
	['qId'=>$template->getAll('id')], true,true);
 
	if(gettype($check)!='boolean')
	{
		return $check['id'] ;
	} 
	return false;
}


include ADMIN_PANEL_TEMPLATE;
 