 
		 
		 
		 
		 
		 
		 
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
?>
<article>
<h2><a class="articleTitle" href="<?php echo WEBROOT.'classrooms/'.$last['id'];?>"><?php echo $page->getAll('page_name');?></a>

</h2>
<div class="articleCoverContainer">
<?php 
$page->showCover();
?>
</div>
<p>Vidiny: Ar <?php echo $page->getAll('subscribe_price');
?>
<nav>
<a href="<?php echo WEBROOT.'addtocart/'.$page->getAll('id');?>" class="addToCart submitBt">atao ao anaty arona</a>
</nav>
</article>
<?php
	}
	$pagination->googleLike();
	?>
	</div>
</div>