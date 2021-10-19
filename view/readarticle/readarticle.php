<div class="alignCenter">
<br>	
	<nav>
		<ul class="imenu">
			<li><a class="blueBt" href="<?php echo WEBROOT.'home/';?>">Accueil</a></li>	
			<li><span class="blueBt" style="border: none; color: #282828;">&gt;&nbsp;</span></li>

			<li><a class="blueBt" href="<?php echo WEBROOT.'home/';?>">Actus</a></li>	
			<li><span class="blueBt" style="border: none; color: #282828;">&gt;&nbsp;</span></li>
            <li><a class="blueBt" href="<?php echo WEBROOT.$article->getAll('article_url');?>"><?php echo $article->getAll('titre_actu');?></a></li>
		</ul>	
	</nav>	
</div>	
<h1><?php echo $article->getAll('titre_actu'); ?></h1>

<br><br>
<div class="alignCenter">
<div class="b7 centerBox">
	
	<?php 

	echo htmlspecialchars_decode($article->getAll('description_actu'));
	 ?>
</div>
</div>
<br><br><br>

<div class="alignCenter">
	<a class="blueBt" href="<?php echo WEBROOT.'contact/';?>">Contactez-nous</a>

</div>

<br><br><br>

