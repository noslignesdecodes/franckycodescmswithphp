 <?php  
$title='Mis à jour utilisateur';
$header='view/users/mg/header/header.php';
$core='view/users/updateform.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';


// echo '<pre>';
// var_dump($pages);
// echo '</pre>';

$userId=(int) $pages[URL_COUNTER+1];
$mainUser=$db->query('SELECT * FROM utilisateurs WHERE id=:qId', 
true,
['qId'=>$userId],true,true);

$user=new User($userId);
 
echo $user->getAll('nom');
// echo $mainUser['nom'];

include 'view/template/page.php';
