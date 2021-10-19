<h1>files&nbsp;<span class="blueBt rounded" ><?php echo $totalFiles;?></span></h1>

<div>Total files : <?php echo $totalFiles;?></div>
<div class="alignCenter">Page <?php echo $pagination->getCurrent().'/'.$pagination->getTotalPages();?></div>

<div class="pagination-conten">
<?php 

foreach($files as $result)
{
	$file=new AppFile($result['id']);
?>
<article>
	 <h2><?php //var_dump($result); 
echo $result['filetitle'];?></h2> 
 
<?php 
switch($result['filetype'])
{
	case 'video':
$imagePath=WEBROOT.'upload/datas/video/'.$result['filename'];
?>
	<video src="<?php echo $imagePath;?>" preload="none" controls>update your browser</video>
<?php
	break;
	case 'image':

$imagePath=WEBROOT.'upload/datas/image/'.$result['filename'];
?>
<img src="<?php echo $imagePath;?>" alt="">
<?php
	break;
	default:
?>
<a class="blueBt" href="<?php echo WEBROOT.'upload/datas/source/'.$result['filename'];?>">download</a>
<?php
	break;
}

	 ?>


<?php 
if($result['is_template'])
{

	?>
	<input type="checkbox" checked="checked">template
	<?php
}
?>
<nav>
	<a href="<?php echo ADMINROOT.'/removefile/'.$result['id'].'/';?>" class="redBt removeBt">remove</a>
</nav>
</article>
<?php
} ?>
</div>
<div class="pagination alignCenter">
	
	<?php 

	$pagination->googleLike();
	?>

</div>