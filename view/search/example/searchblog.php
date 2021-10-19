 
		 
		 
		 
		 
		 
		 
		 
		 
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
?>

<article>
<h2><a class="articleTitle" href="<?php echo WEBROOT.'readblog/'.$last['id'];?>"><?php echo $page->getAll('page_name');?></a>

</h2>
<div class="articleCoverContainer">
<?php 
$page->showCover();
?>
</div>

	<nav>
		<ul>
			<li>
				<a href="<?php echo WEBROOT.'readblog/'.$last['id'];?>" class="submitBt">vakiana</a>
			</li>
			<li>
				<a href="<?php echo WEBROOT.'readblog/'.$last['id'];?>" class="submitBt">comments</a>
			</li>
			 
		</ul>
	</nav>
</article><?php
	}
	$pagination->googleLike();
	?>
	</div>
</div>