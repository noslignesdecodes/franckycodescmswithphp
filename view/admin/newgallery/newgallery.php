<h1>ajout gallerie</h1>

<div class="modalContainer" style="display: block;">
	<div class="modalBox">
		<h2>ajout de nouvelle gallerie</h2><br>
		<div class="modalCloseBt">x</div>
		<form action="<?php echo ADMINROOT.'/savenewgallery/';?>" method="POST">
			
			<label for="">Nom gallerie</label>
			<input type="text" name="title"><br>
			<label for="descriptionGallerie">Description</label>
			<textarea name="description" id="descriptionGallerie"></textarea>
			<br>
			<label for="submitNewGallery" class="fullWidth blueBt alignCenter">enregistrer</label>
			<input type="submit" id="submitNewGallery" class="hide"><br>

		</form>

	</div>
</div>