<?php 


$core='view/admin/updategallery/updategallery.php';


$result=check($pages);
$articleId=(int)$result['3'];
$gallery=new AppGallery($articleId);
$title='Update gallerie '.$gallery->getAll('gallery_title');
$files=$gallery->getFiles();
// echo $gallery->getAll('gallery_title');
// die();
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// $article=new AppArticle($articleId);
// $isPromo=((int)$article->getAll('en_promo')>0)?'selected="selected"': '';
// $notPromo=((int)$article->getAll('en_promo')>0)?'': 'selected="selected"';

include ADMIN_PANEL_TEMPLATE;

