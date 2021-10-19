<h1>Recherche utilisateur</h1>

<p>Total résultat <span class="grayColor bold"><?php echo $total;?></span> / <?php echo $totalUsers;?></p>
<div class="timelines">
<?php 
foreach($all as $result)
{
	$user=new User($result['id']);
?>
<div class="someTimeline">
	<a href="<?php echo WEBROOT.'updateuser/'.$user->getAll('id');?>"><?php 
echo $user->getName();
	 ?></a>
</div>
<?php


}
$pagination->googleLike();
?>	
</div>
 