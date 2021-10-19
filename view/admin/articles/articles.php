<h1 class="relative">articles&nbsp;<span class="blueBt rounded" ><?php echo $totalArticles;?></span></h1>
<div class="alignCenter">Page <?php echo $pagination->getCurrent().'/'.$pagination->getTotalPages();?></div>

<div class="pagination-conten">
<?php 
foreach($articles as $result)
{

	
	$myArticle=new AppArticle($result['id']);
	//$myArticle->getAll('titre_actu');

	?>
	<article class="p25 toRemoveArticle">
		<h2><?php echo $result['titre_actu'];?></h2>
		<div class="">
			<div class=" "><a class="blueBt" href="<?php echo ADMINROOT.'/updatearticle/'.$result['id'];?>">update</a><a class="addGalleriesToArticle blueBt" id="articleId_<?php echo $result['id'];?>" href="<?php echo ADMINROOT.'/addgalleriestoarticle/'.$result['id'];?>">ajout gallerie</a>
				<a href="<?php echo ADMINROOT.'/removearticle/'.$result['id']; ?>" class="removeArticleBt redBt">remove</a>
			</div>
			 
		</div><br>
		<div class="articlesGalleries">
			<?php 
			echo $myArticle->showGalleries();
			?>
		</div>
		<div class="toggleBt"></div>
		<div class="toggleMenus"><?php echo htmlspecialchars_decode($result['description_actu']);?></div>

		<br><br> 
	</article>

	<?php 
}
?>
</div>
<div class="pagination alignRight">
	<?php 
$pagination->googleLike();
 ?>
</div>