<div class="b7 alignCenter centerBox updateArticleContainer"><h1>update actu</h1>

<br>
<br>
<br>
<div class="modalContainer " style="display: block;">
	<div class="modalBox modalFull">
		<div class="modalCloseBt">x</div>
		<h2>update article</h2>
		<!-- <p>Veuillez remplir les informations suivantes pour créer un article</p> -->
<form class="simpleCmsEditor" action="<?php echo ADMINROOT.'/saveupdatearticle/';?>" method="POST">
	<input type="hidden" id="baseUrl" value="<?php echo ADMINROOT;?>/">
<label for="">Titre</label>
<input type="text" name="title" value="<?php echo $article->getAll('titre_actu');?>" >
<br> 
<label for="">Description</label>
<textarea name="description" id="" ></textarea>
<div class="editorContent customEditor" contenteditable="true">
	<?php 

	echo htmlspecialchars_decode($article->getAll('description_actu'));
	?>
</div>
<br><br>
<label for="">Categorie</label>
<select name="category" class="fullWidth" id="">

	<option selected="selected" value="<?php echo $article->getAll('categorie');?>"><?php echo $article->getAll('categorie');?></option> 
	<option value="vehicules">Véhicules</option> 
	<option value="motos">motos</option>  
	<option value="groupes_electrogenes">Groupes éléctrogènes</option> 
	<option value="moteurs">Moteurs</option>  
	<option value="blog">blog</option>
	<option value="employe">employe</option> 
	<option value="cv">cv</option> 
	<option value="portfolio">portfolio</option> 

	<option value="portfolio">photo</option> 

	<option value="portfolio">videos</option> 
	<option value="socialicons">social icons</option> 
	
	<option value="shop">shop</option>
	
	<option value="services">services</option>  
	<option value="autres">autres</option>
</select><br>
<label for="">Prix</label>
<div class="" >
<input type="text" name="price" id="price" value="<?php echo $article->getAll('prix');?>" class="ib" ><div class="alignRight">Ar</div>
</div>
 
<br>
<label for="">Promotion</label>
<select name="promo" class="fullWidth" id="">
	<option value="yes" <?php echo $isPromo;?>>Oui</option> 
	<option value="no"  <?php echo $notPromo;?>>Non</option>  
	 
</select>
<br><br>
<label for="tags">tags</label>
<input type="text" id="tags" name="tags" value="<?php echo $article->getAll('article_tags');?>"><br><br>
<input type="hidden" name="actuId" value="<?php echo $article->getAll('id');?>">
<label for="submitNewActu" class="blueBt">enregistrer</label>
<a class="addGalleriesToArticle blueBt" id="articleId_<?php echo $article->getAll('id');?>" href="<?php echo ADMINROOT.'/addgalleriestoarticle/'.$article->getAll('id');?>">ajout gallerie</a>
<input type="submit" id="submitNewActu" class="hide"><br><br><br><br><br>
</form>
</div>
</div>
</div>