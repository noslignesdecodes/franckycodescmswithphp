 
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
?>
<article>
	<h2><a href="<?php echo WEBROOT.'classrooms/'.$result['id'];?>"><?php echo $result['page_name'];?></a></h2>
<div class="articleCoverContainer">
<?php 
    $classroom->showCover();
?>
</div>
	<p>Prix fisoratana anarana: Ar <?php echo $classroom->getAll('subscribe_price');?> na 
		<?php echo $classroom->getAll('subscribe_price')*5;?> FMG
	</p>
	<nav>
		<ul>
			<?php 

			if(isUserOnline() && !$classroom->findStudent($_SESSION['userConnected']))
			{
			?>
			<li><a class="submitBt" href="<?php echo WEBROOT.'classrooms/'.$result['id'].'/subscribe/';?>">Hisoratra anarana</a></li>
			<?php 

		}else{
?>
<li><a class="submitBt" href="<?php echo WEBROOT.'classrooms/'.$result['id'].'/';?>">mpianatra ato ianao</a></li>
<?php
		}

		?>
			<li><a class="submitBt" href="<?php echo WEBROOT.'classrooms/'.$result['id'].'/projects/';?>">Projects <?php echo $classroom->getTotalProjects();?></a></li>
		</ul>
	</nav>
</article>
<?php
	}
	$pagination->googleLike();
	?> 
</div>
</div>