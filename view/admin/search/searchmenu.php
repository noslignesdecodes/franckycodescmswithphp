<h1>Bienvenue sur la page de recherche</h1>
<br><br>
<nav class="searchMenu">
	<ul>
		<li><a class="<?php echo isCurrent('articles', $category); ?>" href="<?php echo ADMINROOT.'/search/articles/'.$myquery.'/';?>">Articles</a></li>
		<li><a class="<?php echo isCurrent('files', $category); ?>"  href="<?php echo ADMINROOT.'/search/files/'.$myquery.'/';?>">Fichiers</a></li>
		<li><a class="<?php echo isCurrent('messages', $category); ?>" href="<?php echo ADMINROOT.'/search/messages/'.$myquery.'/';?>">Messages</a></li>
		<li><a class="<?php echo isCurrent('galleries', $category); ?>" href="<?php echo ADMINROOT.'/search/galleries/'.$myquery.'/';?>">Galleries</a></li>
		<li><a class="<?php echo isCurrent('autres', $category); ?>" href="<?php echo ADMINROOT.'/search/autres/'.$myquery.'/';?>">Autres</a></li>
	</ul>
</nav>