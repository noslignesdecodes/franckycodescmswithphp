<?php  
$title='Nos produits'; 
$core='view/nosproduits/nosproduits.php';
 
$vehicules=$db->query('SELECT * FROM actus WHERE categorie=:qCat ORDER BY id DESC LIMIT 0,5', true, 
['qCat'=>"vehicules"],true);
$motos=$db->query('SELECT * FROM actus WHERE categorie=:qCat ORDER BY id DESC LIMIT 0,5', true, 
['qCat'=>"motos"],true);
$groupes=$db->query('SELECT * FROM actus WHERE categorie=:qCat ORDER BY id DESC LIMIT 0,5', true, 
['qCat'=>"groupes_electrogenes"],true);
$moteurs=$db->query('SELECT * FROM actus WHERE categorie=:qCat ORDER BY id DESC LIMIT 0,5', true, 
['qCat'=>"moteurs"],true);

include MAIN_TEMPLATE;
