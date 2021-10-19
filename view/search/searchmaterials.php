<h1>Recherche materiels</h1>

<p>Total résultat <span class="grayColor bold"><?php echo $total;?></span> / <?php echo $totalMateriels;?></p>
<div class="timelines">
<?php 
foreach($all as $result)
{
	$material=new Material($result['id']);
?>
<div class="someTimeline">
	<?php 
echo $material->getAll('type_materiel');
	 ?>
</div>
<?php


}
$pagination->googleLike();
?>	
</div>
 