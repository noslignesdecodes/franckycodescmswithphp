		
		<?php 
use franckycodes\database\LightDb;

$title='Recherche';
$header='view/users/mg/header/header.php';

$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';

// $_SESSION['searchCategory']='class';
// $myquery=isset($paths['query'])?$paths['query']:'';

// $myquery=str_replace('?', '',$myquery);
// $myquery=explode('/',$myquery);

$myquery=isset($pages[4])?$pages[4]:'';
$category=isset($pages[3])?$pages[3]:'articles';

// echo '<pre>';
// var_dump($pages);
// echo '</pre>';
// echo '<pre>';
// var_dump($myquery);
// echo '</pre>';

// if(count($myquery)>0)
// {
// 	for ($i=0,$c=count($myquery);$i<$c;$i++)
// 	{
// 		if(preg_match('#q=#',$myquery[$i]))
// 		{
// 			$myquery=str_replace('q=','',$myquery[$i]);
// 			break;
// 		}
// 	}
// } 


// if(isset($pages[URL_COUNTER+2])&& strlen($pages[URL_COUNTER+2])>2){
// 	$query=$myquery;
// 	$category=htmlspecialchars(isset($pages[URL_COUNTER+1])?$pages[URL_COUNTER+1]:'');
// 	$_SESSION['searchCategory']=$category;
// 	$_SESSION['searchQuery']=$query;

// }else
// {
// 	$query=$myquery;
// 	$category= isset($pages[URL_COUNTER+1])?$pages[URL_COUNTER+1]:'class'; 
// 	$_SESSION['searchCategory']=$category;
// 	$_SESSION['searchQuery']=$query;
// }

$_SESSION['searchCategory']=$category;
$_SESSION['searchQuery']=$myquery;


$core='view/admin/search/search.php';

$customMenu='view/admin/search/searchmenu.php'; //search menu 

// echo '<pre>';
// var_dump($pages);
// echo '</pre>';

// die();


function isCurrent($searchpage, $searchCategory)
{
	if($searchpage==$searchCategory)
	{
		echo 'current';
	}
}
function getSomeImages($galleryId){
	$db=new LightDb();
	$someImages=$db->query('SELECT * FROM app_galleries_files WHERE gallery_id=:qGallery ORDER BY id DESC LIMIT 0,3', 
	true, 
	['qGallery'=>$galleryId],true);

	return $someImages;
}
 
$page='home';
switch($category)
{
 
 	case 'galleries': 
  
		$total=$db->query('SELECT COUNT(id) total FROM app_galleries WHERE ((gallery_title REGEXP(:q)) OR (gallery_description REGEXP(:q))) ',true,
		 		['q'=>$myquery
		 		],true,true)['total'];
 
	 	$pagination=new AppPagination(ADMINROOT.'/search/galleries/'.$myquery.'/', 'page', 'perpage', $total, '#profile');
	 	$pagination->setPerPage(10);
		
		$all=$db->query('SELECT * FROM app_galleries WHERE ((gallery_title REGEXP(:q)) OR (gallery_description REGEXP(:q))) ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),true,
		 		['q'=>$myquery
		 		],true);
		
		$core='view/admin/search/searchgalleries.php';
 
	break;
	case 'messages': 
		$total=$db->query('SELECT COUNT(id) total FROM app_inbox WHERE ((user_name REGEXP(:q)) OR (user_email REGEXP(:q)) OR (user_message REGEXP(:q))) ',true,
		 		['q'=>$myquery
		 		],true,true)['total'];


	 	$pagination=new AppPagination(ADMINROOT.'/search/messages/'.$myquery.'/', 'page', 'perpage', $total, '#profile');
	 	$pagination->setPerPage(10);
		 
		$all=$db->query('SELECT * FROM app_inbox WHERE ((user_name REGEXP(:q)) OR (user_email REGEXP(:q)) OR (user_message REGEXP(:q))) ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),true,
		 		['q'=>$myquery
		 		],true);
		
		$core='view/admin/search/searchmessages.php';

	break;
	case 'files': 
		$total=$db->query('SELECT COUNT(id) total FROM appupload WHERE ((filetitle REGEXP(:q)) OR (filedescription REGEXP(:q))) ',true,
		 		['q'=>$myquery
		 		],true,true)['total'];


	 	$pagination=new AppPagination(ADMINROOT.'/search/files/'.$myquery.'/', 'page', 'perpage', $total, '#profile');
	 	$pagination->setPerPage(10);
		 
		$all=$db->query('SELECT * FROM appupload WHERE ((filetitle REGEXP(:q)) OR (filedescription REGEXP(:q))) ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),true,
		 		['q'=>$myquery
		 		],true);
		
		$core='view/admin/search/searchfiles.php';

	break;
	case 'articles':
	default:
	    $page='articles';
	 	//clients
	 	//echo WEBROOT.'search/class/?q='.$query;

		
		
	 	$total=$db->query('SELECT COUNT(id) total FROM actus WHERE ((titre_actu REGEXP(:q)) OR (description_actu REGEXP(:q)) OR (categorie REGEXP(:q))) ',true,
		 		['q'=>$myquery
		 		],true,true)['total'];


	 	$pagination=new AppPagination(ADMINROOT.'/search/articles/'.$myquery.'/', 'page', 'perpage', $total, '#profile');
	 	$pagination->setPerPage(10);
		 
		$all=$db->query('SELECT * FROM actus WHERE ((titre_actu REGEXP(:q)) OR (description_actu REGEXP(:q)) OR (categorie REGEXP(:q))) ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),true,
		 		['q'=>$myquery
		 		],true);
		
		$core='view/admin/search/searcharticles.php';
	break;
}
  
include ADMIN_PANEL_TEMPLATE;


	