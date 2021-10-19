<section class="alignCenter">
	<h2>Recherche articles</h2>

	
		<br><br>
		<div class="blueBt"><?php echo $total;?> trouvé(s)</div>
	<div>

		<!-- <div>
			
			Categorie<br>
			<a href="#" class="blueBt toggleBt" style="min-width: 150px;">categorie</a>
			<div class="toggleMenus" style="">
				<ul class="imenu showGalleriesContainer">
					<li><a href="<?php //echo ADMINROOT.'/setsearchsubcategory/blog/';?>">Blog</a></li>
					<li><a href="<?php //echo ADMINROOT.'/setsearchsubcategory/vehicules/';?>">Articles</a></li>
					<li><a href="<?php //echo ADMINROOT.'/setsearchsubcategory/shop/';?>">Shop</a></li>

				</ul>
			</div>
		</div> -->
		<?php 
		foreach($all as $result)
		{
			$articleFound=new AppArticle($result['id']);

?>
		<article>
			<h2><?php echo $articleFound->getAll('titre_actu');?></h2>

			<div>
				<?php 
				echo htmlspecialchars_decode($articleFound->getAll('description_actu'));
				?>
			</div>
			<nav class="alignRight">
				<a class="blueBt" href="<?php echo ADMINROOT.'/updatearticle/'.$articleFound->getAll('id');?>">update</a>
			</nav>
		</article>
<?php 
		}
		?>
	</div>

	<div class="pagination">
		<?php 

		$pagination->googleLike();
		?>
	</div>
	
</section>