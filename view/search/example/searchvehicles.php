<div class="site-container">
	<div class="search-container">
	<?php 
	include 'view/users/mg/search/searchmenu.php';
	?>
	<h1>Recherche</h1>
	<p>Vous recherchez <strong><?php echo $query;?></strong></p>
	<p>Catégorie: <?php echo $category;?></p>
	<p>Total trouvés <?php echo $total;?></p>
	<?php 
	// showing results
	foreach($all as $result)
	{
		include 'view/users/mg/vehicles/vehiclemenu.php';
	}
	?>
	</div>
</div>