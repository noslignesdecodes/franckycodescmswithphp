 <?php  
$title='Ajout materiels';
$header='view/users/mg/header/header.php';
$core='view/materials/addform.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';

 
$series=$db->query('SELECT * FROM series WHERE series_type="onduleur"',false,[],true);
$users=$db->query('SELECT * FROM utilisateurs ORDER BY id DESC',false,[],true);

include 'view/template/page.php';
