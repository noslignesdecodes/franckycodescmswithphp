<section class="alignCenter">
	<h2>Recherche fichiers
		<div class="ib alignRight"><a href="<?php echo ADMINROOT.'/upload/';?>" class="blueBt">Upload</a></div></h2> 
		<br><br>
		<div class="blueBt"><?php echo $total;?> trouvé(s)</div>
	<div>
		<?php 
		
foreach($all as $result)
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

<nav>
	<a href="<?php echo ADMINROOT.'/removefile/'.$result['id'].'/';?>" class="redBt removeBt">remove</a>
</nav>
</article>
<?php
} ?>
	</div>

	<div class="pagination">
		<?php 

		$pagination->googleLike();
		?>
	</div>
	
</section>