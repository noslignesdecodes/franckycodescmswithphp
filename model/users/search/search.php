<?php  
$title='Recherche';
$header='view/users/mg/header/header.php';

$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';

$_SESSION['searchCategory']='class';
$myquery=isset($paths['query'])?$paths['query']:'';

$myquery=str_replace('?', '',$myquery);
$myquery=explode('/',$myquery);
/*echo '<pre>';
var_dump($myquery);
echo '</pre>';*/

if(count($myquery)>0)
{
	for ($i=0,$c=count($myquery);$i<$c;$i++)
	{
		if(preg_match('#q=#',$myquery[$i]))
		{
			$myquery=str_replace('q=','',$myquery[$i]);
			break;
		}
	}
} 


if(isset($pages[URL_COUNTER+2])&& strlen($pages[URL_COUNTER+2])>2){
	$query=$myquery;
	$category=htmlspecialchars(isset($pages[URL_COUNTER+1])?$pages[URL_COUNTER+1]:'');
	$_SESSION['searchCategory']=$category;
	$_SESSION['searchQuery']=$query;

}else
{
	$query=$myquery;
	$category= isset($pages[URL_COUNTER+1])?$pages[URL_COUNTER+1]:'class'; 
	$_SESSION['searchCategory']=$category;
	$_SESSION['searchQuery']=$query;
}


$core='view/search/searchusers.php';

// echo '<pre>';
// var_dump($pages);
// echo '</pre>';

switch($category)
{
 
	case 'materials':
 	$page='materials';
 	//clients
 	//echo WEBROOT.'search/class/?q='.$query;

	
	
 	$total=$db->query('SELECT COUNT(id) total FROM materiels WHERE ((nom_materiel REGEXP(:q)) OR (numserie REGEXP(:q)) OR  (type_materiel REGEXP(:q)))',true,
	 		['q'=>$query
	 		],true,true)['total'];


 	$pagination=new AppPagination(WEBROOT.'search/materials/?q='.$query.'/', 'page', 'perpage', $total, '#profile');
 	$pagination->setPerPage(5);
	 
	$all=$db->query('SELECT * FROM materiels WHERE ((nom_materiel REGEXP(:q)) OR (numserie REGEXP(:q)) OR  (type_materiel REGEXP(:q))) ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),true,
	 		['q'=>$query
	 		],true);
	
	$core='view/search/searchmaterials.php';

	break;
	
	default:
        $page='users';
 	//clients
 	//echo WEBROOT.'search/class/?q='.$query;

	
	
 	$total=$db->query('SELECT COUNT(id) total FROM utilisateurs WHERE ((nom REGEXP(:q)) OR (prenoms REGEXP(:q)) OR  (u_initial REGEXP(:q)))',true,
	 		['q'=>$query
	 		],true,true)['total'];


 	$pagination=new AppPagination(WEBROOT.'search/users/?q='.$query.'/', 'page', 'perpage', $total, '#profile');
 	$pagination->setPerPage(5);
	 
	$all=$db->query('SELECT * FROM utilisateurs WHERE ((nom REGEXP(:q)) OR (prenoms REGEXP(:q)) OR  (u_initial REGEXP(:q))) ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),true,
	 		['q'=>$query
	 		],true);
	
	$core='view/search/searchusers.php';
	break;
}
  
include 'view/template/search.php';
