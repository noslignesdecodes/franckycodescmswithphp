 <?php  
$title='Liste materiels';
$header='view/users/mg/header/header.php';
$core='view/materials/list.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';



$listMaterials=$db->query('SELECT * FROM materiels WHERE nom_materiel IS NOT NULL ORDER BY id DESC', false,[],true);


 

include 'view/template/page.php';
