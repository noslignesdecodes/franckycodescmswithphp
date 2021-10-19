 <?php  
$title='Liste utilisateurs';
$header='view/users/mg/header/header.php';
$core='view/users/list.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';


$listUsers=$db->query('SELECT * FROM utilisateurs ORDER BY id DESC', false,[],true);

 

include 'view/template/page.php';
