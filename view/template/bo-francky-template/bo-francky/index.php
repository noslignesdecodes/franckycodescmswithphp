<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo WEBROOT.'view/template/admin_panel_by_francky_bofrancky_v0/css/app.css';?>">
	<meta charset="utf-8"> 
</head>
<body>
	<header class="adminTopbar">
		
		<div class="topbarContainer">
			<div class="ib mainMenuIcon"></div>
			<div class="ib welcomeAdmin"><a href="<?php echo ADMINROOT.'/home';?>">welcome admin</a></div>
			<div class="appMessagesContainer ib"><a class="appMessages" href="<?php echo ADMINROOT.'/inbox/';?>"><img src="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/img/message-logo.png';?>" alt=""><span class="appNotif"><?php echo TOTAL_MESSAGES;?></span></a></div>
			<a href="<?php echo ADMINROOT.'/profile/';?>" class="adminProfileBt"><span class="adminIcon"></span></a>
		</div>
		<input type="hidden" id="baseUrl" value="<?php echo ADMINROOT.'/';?>">
	</header>
	<div class="leftBar">
		<h2 title="admin panel cms V0 by francky">admin panel</h2>
		<div><a href="<?php echo WEBROOT.'home/';?>" class="blueBt" target="_blank">Go visit default site</a></div>
		<form class="adminLeftSearch relative" action="<?php echo ADMINROOT.'/search/'. (isset($_SESSION['searchCategory'])?$_SESSION['searchCategory']: 'articles').'/';?>" method="GET">
			<input type="text" class="q" value="<?php echo isset($_SESSION['searchQuery'])? $_SESSION['searchQuery']:'hello world';?>" >
			<label for="submitSearch" class="searchIcon"></label>
			<input type="submit" id="submitSearch" style="display:none;"  >
		</form>
		<nav class="adminMainMenu">
			<ul>
				<li><a href="<?php echo ADMINROOT.'/home/';?>">Admin home</a></li> 
				<li><a class="toggleBt" href="<?php echo ADMINROOT.'/pages/';?>">Pages</a>
					<ul class="toggleMenus">
						<li><a href="<?php echo ADMINROOT.'/newpage/';?>">New</a></li> 
						<li><a href="<?php echo ADMINROOT.'/pages/';?>">all</a></li>
					</ul>
				</li>
				<li><a class="toggleBt" href="<?php echo ADMINROOT.'/templates/';?>">Templates</a>
					<ul class="toggleMenus">
						<li><a href="<?php echo ADMINROOT.'/newtemplate/';?>">New</a></li> 
						<li><a href="<?php echo ADMINROOT.'/templates/';?>">all</a></li>
					</ul>
				</li>
				<li><a class="toggleBt" href="<?php echo ADMINROOT.'/articles/';?>"><span class="newArticleIcon icon"></span>articles</a>
					<ul class="toggleMenus">
						
						<li><a href="<?php echo ADMINROOT.'/newarticle/';?>"><span class="newArticleIcon icon"></span>new article</a></li>
						<li><a href="<?php echo ADMINROOT.'/articles/';?>"><span class="articlesIcon icon"></span>articles<span class="total"><?php echo $totalArticles; ?></span></a></li>

					</ul>

				</li>
				
				<li><a class="toggleBt" href="<?php echo ADMINROOT.'/files/';?>">files</a>
					<ul class="toggleMenus">
						<li><a href="<?php echo ADMINROOT.'/files/';?>"><span class="newGalleryIcon icon"></span>files<span class="total"><?php echo $totalFiles;?></span></a></li>
						<li><a href="<?php echo ADMINROOT.'/upload/';?>"><span class="uploadIcon icon"></span>upload</a></li>
					</ul>
				</li>

				<li><a href="<?php echo ADMINROOT.'/update/';?>"><span class="updateIcon icon"></span>update</a></li>
				<li><a href="<?php echo ADMINROOT.'/inbox/';?>"><span class="inboxIcon icon"></span>Inbox <span class="total"><?php echo TOTAL_MESSAGES;?></span></a></li>
				<li><a href="<?php echo ADMINROOT.'/goldbook/';?>"><span class="goldBookIcon icon"></span>Livres d'or<span class="total">0</span></a></li>
				<li><a href="<?php echo ADMINROOT.'/totalSearch/';?>"><span class="leftBarSearchIcon icon"></span>Recherche<span class="total">0</span></a></li>

				<li><a href="<?php echo ADMINROOT.'/alerts/';?>"><span class="alertIcon icon"></span>Alertes<span class="total">0</span></a></li>

				<li><a class="toggleBt" href="<?php echo ADMINROOT.'/galleries/';?>">Galleries</a>
					<ul class="toggleMenus">
						<li><a href="<?php echo ADMINROOT.'/newgallery/';?>"><span class="newGalleryIcon icon"></span>ajout gallerie</a></li>
						<li><a href="<?php echo ADMINROOT.'/gallery/';?>"><span class="newGalleryIcon icon"></span>galleries<span class="total"><?php echo TOTAL_GALLERIES;?></span></a></li>
					</ul>
				</li>
				<li><a href="<?php echo ADMINROOT.'/doc/';?>"><span class="alertIcon icon"></span>Doc</a></li>
			 
			</ul>
		</nav><br>
		<nav class="alignCenter"><a class="blueBt" href="<?php echo ADMINROOT.'/logout/';?>">logout</a></nav>
		<div class="copyright">
			&copy; <a href="mailto:franckywebdesign@gmail.com">Francky</a>
		</div>
	</div>
	<div class="appCore">

		<?php 

		if(isset($customMenu))
		{
			include $customMenu; 
		}
	 
	 
		include $core;

		 ?>
	</div>
	<footer></footer>
	<script src="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/js/PhpChat.js';?>"></script>
	<script src="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/js/simplecmseditorbyfrancky/editor.js';?>"></script>

	<script src="<?php echo WEBROOT.'js/app.js';?>"></script>
	<script src="<?php echo WEBROOT.'view/template/bo-francky-template/bo-francky/js/app.js';?>"></script>
</body>
</html>