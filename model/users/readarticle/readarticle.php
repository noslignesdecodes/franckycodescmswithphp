<?php  
$articleId=(int)(isset($pages[2])?$pages[2]:0);
if(!$articleId)
{
	header('Location: '.WEBROOT.'home/');
	die();
}
$article=new AppArticle($articleId);

$title=$article->getAll('titre_actu').'| Madauto'; 
$core='view/readarticle/readarticle.php';
 
// echo '<pre>';
// var_dump($pages);
// echo '</pre>';

// die();

include MAIN_TEMPLATE;
