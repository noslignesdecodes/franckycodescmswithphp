<?php 
// echo '<pre>';
// var_dump($files);
// die();
foreach($files as $result)
{
	$file=new AppFile($result['file_id']);
?>
<article>
	 <h2><?php //var_dump($result); 
echo $file->getAll('filetitle');?></h2> 
 
<?php 
switch($file->getAll('filetype'))
{
	case 'video':
$imagePath=WEBROOT.'upload/datas/video/'.$file->getAll('filename');
?>
	<video src="<?php echo $imagePath;?>" preload="none" controls>update your browser</video>
<?php
	break;
	case 'image':

$imagePath=WEBROOT.'upload/datas/image/'.$file->getAll('filename');
?>
<img src="<?php echo $imagePath;?>" alt="">
<?php
	break;
	default:
?>
<a class="blueBt" href="<?php echo WEBROOT.'upload/datas/source/'.$file->getAll('filename');?>">download</a>
<?php
	break;
}

	 ?>

<nav>
	<a href="<?php echo ADMINROOT.'/removefilefromgallery/'.$gallery->getAll('id').'/' .$file->getAll('id').'/';?>" class="redBt removeBt">remove</a>
</nav>
</article>
<?php
} ?>