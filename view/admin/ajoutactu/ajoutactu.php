<div class="b7 alignCenter centerBox"><h1>ajout actu</h1>

<br>
<br>
<br>
<div class="modalContainer " style="display: block;">
	<div class="modalBox modalFull">
		<div class="modalCloseBt">x</div>
		<h2>ajout article</h2>
		<!-- <p>Veuillez remplir les informations suivantes pour créer un article</p> -->
		<form class="simpleCmsEditor" action="<?php echo ADMINROOT.'/saveactu/';?>" method="POST">
			<input type="hidden" id="baseUrl" value="<?php echo ADMINROOT;?>/">
		<label for="">Titre</label>
		<input type="text" name="title">
		<br>
		<label for="">Description</label>
		<textarea name="description" id="" ></textarea>
		<div class="editorContent customEditor" contenteditable="true">
		</div>
		<br><br>
		<label for="">Categorie</label>
		<select name="category" class="fullWidth" id="">
			 
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
		<input type="text" name="price" id="price" class="ib" ><div class="alignRight">Ar</div>
		</div>
		 
		<br>
		<label for="">Promotion</label>
		<select name="promo" class="fullWidth" id="">
			<option value="yes">Oui</option> 
			<option value="no">Non</option>  
			 
		</select>
		<br><br>
		<label for="tags">tags</label>
		<input type="text" id="tags" name="tags"><br><br>
		<label for="submitNewActu" class="fullWidth blueBt">enregistrer</label>
		<input type="submit" id="submitNewActu" class="hide"><br><br><br><br><br>
		</form>
	</div>
</div>
</div>