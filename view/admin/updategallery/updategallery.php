<h1>mis a jour gallerie <?php echo $gallery->getAll('gallery_title');?></h1>
<div>
	<a href="#" class="darkBt">Id: <?php echo $gallery->getAll('id');?></a>
</div><br>
<div>
	<a class="alignCenter fullWidth addImageGallery blueBt" href="<?php echo ADMINROOT.'/addfilegallery/'.$gallery->getAll('id').'/';?>">ajouter une image</a><br>
	<?php 

    $gallery->showFiles();
	?>


</div>