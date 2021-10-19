<section class="alignCenter">
	<h2>Galleries
		<div class="ib alignRight"><a href="<?php echo ADMINROOT.'/upload/';?>" class="blueBt">Upload</a></div></h2> 
		<br><br>
		<div class="blueBt"><?php echo $total;?> trouvé(s)</div>
	<div>
		<?php 
foreach($all as $result)
	{
?>
<article id="galleryId<?php echo $result['id'];?>">
	<h2><?php echo $result['gallery_title'];?></h2>
	<div class="darkBt">id: <?php echo $result['id'];?></div><br><br>
	<div><?php echo $result['gallery_description'];?></div>


	<div class="galleriesSample">
	<?php 
		$images=getSomeImages($result['id']);

		foreach($images as $sample)
		{
			$file=new AppFile($sample['file_id']);
			$path= WEBROOT.'upload/datas/image/'.$file->getAll('filename');
?>
		<img src="<?php echo $path;?>" alt="">
<?php 
		}
	?>
	</div>

	<nav>
		
		<a class="addImageGallery blueBt" href="<?php echo ADMINROOT.'/addfilegallery/'.$result['id'].'/';?>">ajouter une image</a><a class="updateGalleryBt blueBt" href="<?php echo ADMINROOT.'/updategallery/'.$result['id'].'/';?>">update</a>
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