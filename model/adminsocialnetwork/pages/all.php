<?php
$title='Les pages';
$header='view/users/mg/header/header.php';
$core='view/admin/pages/all.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
 

$pagination=new AppPagination(ADMINROOT.'/pages', 'page', 'xyz', $totalFiles);

function getDirectory($mydir='.')
{
	// $mydir='.';

	$files=scandir($mydir);

	foreach($files as $result)
	{
		// echo '<pre>';
		// var_dump($result);
		if(is_dir($result))
		{
			echo '<a href="'.ADMINROOT.'/getdirectory/'. $result.'"><strong>'.$result.'/</strong></a><br>';
		}else{
			echo  $result.'<br>';
		}
	}
}
getDirectory();
// echo '<pre>';
// var_dump($files);
// echo '</pre>';
die();
include ADMIN_PANEL_TEMPLATE;
 
 