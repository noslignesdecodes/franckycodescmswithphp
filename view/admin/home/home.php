<section class="alignCenter">
	<div class="b7 centerBox">
		<h1>welcome admin</h1>
		<br>
		<div>Bienvenue admin</div><br> 
	</div>
</section>
<section>
	<br><br>
	<article class="alignCenter">
		<br><br>
		<h2 class="darkText">Messages</h2><br><br><br>
		<div ><a class="blueBt" href="<?php echo ADMINROOT.'/inbox/';?>"><?php echo TOTAL_MESSAGES;?></a></div><br>
		<nav><a class="blueBt" href="<?php echo ADMINROOT.'/inbox/';?>">inbox</a></nav>
	</article>
	<article class="alignCenter">
		<br><br>
		<h2 class="darkText">Actualités</h2><br><br><br>
		<div ><a class="blueBt" href="<?php echo ADMINROOT.'/articles/';?>"><?php echo $totalArticles;?></a></div><br>  
		<nav><a class="blueBt" href="<?php echo ADMINROOT.'/newarticle/';?>">new article</a></nav>
	</article>
	<article class="alignCenter">
		<br><br>
		<h2 class="darkText">Fichiers</h2><br><br><br>
		<div ><a class="blueBt" href="<?php echo ADMINROOT.'/files/';?>"><?php echo $totalFiles;?></a></div><br>
		<nav><a class="blueBt" href="<?php echo ADMINROOT.'/upload/';?>">upload</a></nav>
	</article>

	<article class="alignCenter">
		<br><br>
		<h2 class="darkText">Galleries</h2><br><br><br>
		<div ><a class="blueBt" href="<?php echo ADMINROOT.'/gallery/';?>"><?php echo TOTAL_GALLERIES;?></a></div><br>
		<nav><a class="blueBt" href="<?php echo ADMINROOT.'/gallery/';?>">voir les galleries</a></nav>
	</article>
	<article class="alignCenter">
		<br><br>
		<h2 class="darkText">Documentation</h2><br><br><br>
		<p>On vous invite à lire la documentation</p>
		<div ><a class="blueBt" href="<?php echo ADMINROOT.'/doc/';?>">Lire la documentation</a></div><br>
	 
	</article>
</section>