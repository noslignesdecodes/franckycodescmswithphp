<?php  
use franckycodes\database\LightDb;
$title='Galleries';
$header='view/users/mg/header/header.php';
$core='view/admin/gallery/gallery.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
 

$pagination=new AppPagination(ADMINROOT.'/gallery/', 'page', 'pp', TOTAL_GALLERIES);

$galleries=$db->query('SELECT * FROM app_galleries ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(), false,[],true);

if($galleries ==null)
{
	$galleries=[];
}

function getSomeImages($galleryId){
	$db=new LightDb();
	$someImages=$db->query('SELECT * FROM app_galleries_files WHERE gallery_id=:qGallery ORDER BY id DESC LIMIT 0,3', 
	true, 
	['qGallery'=>$galleryId],true);

	return $someImages;
}
 
include ADMIN_PANEL_TEMPLATE;
