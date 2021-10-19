 
		 
		 
		 
		 
		 
		 
		 
		 
		<div class="site-container">
	
	<div class="search-container">
	<h1><a href="#">Fikarohana</a></h1>
	<?php 
	include 'view/users/mg/search/searchmenu.php';
	?>
	<div class="message">
<?php echo $total;?> hita
</div> 
	<?php 
 
	// showing results
	foreach($all as $result)
	{
		$classroom=new AppPage($result['id']);
$page=$classroom;
$last=$result;
$user=new AppUser($result['id']);
?>
<article>
<h2><a class="articleTitle" href="<?php echo WEBROOT.'profile/'.$last['id'];?>"><?php echo $user->getName();?></a>

</h2>
<div class="articleCoverContainer">
 
</div>
 
<nav>
<a href="<?php echo WEBROOT.'profile/'.$last['id'];?>" class="submitBt" >show profile</a>
</nav>
</article>
<?php
	}
	$pagination->googleLike();
	?>
	</div>
</div>