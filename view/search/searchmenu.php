<nav id="searchMainMenu" class="inlineMenu">
	<ul>
		<li><a <?php echo testCurrentPage($page, 'home');?>  href="<?php echo WEBROOT.'home';?>">Accueil</a></li>
		<li><a <?php echo testCurrentPage($page, 'users');?>  href="<?php echo WEBROOT.'search/users/?q='.$_SESSION['searchQuery'];?>">Utilisateurs</a></li>
		<li><a <?php echo testCurrentPage($page, 'materials');?>  href="<?php echo WEBROOT.'search/materials/?q='.$_SESSION['searchQuery'];?>">Materiels</a></li>
		<li><a href="<?php echo WEBROOT.'search/timeline/?q='.$_SESSION['searchQuery'];?>">Timeline</a></li>
		<li><a href="<?php echo WEBROOT.'search/others/?q='.$_SESSION['searchQuery'];?>">Autres</a></li>
	</ul>
</nav>