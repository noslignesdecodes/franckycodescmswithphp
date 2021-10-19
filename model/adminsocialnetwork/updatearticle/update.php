<?php 
$title='Update article ';

$core='view/admin/updatearticle/update.php';


$result=check($pages);
$articleId=(int)$result['3'];
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
$article=new AppArticle($articleId);
$isPromo=((int)$article->getAll('en_promo')>0)?'selected="selected"': '';
$notPromo=((int)$article->getAll('en_promo')>0)?'': 'selected="selected"';

include ADMIN_PANEL_TEMPLATE;

