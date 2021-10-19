<h1>ajout utilisateur</h1>
<p>Formulaire d'enregistrement des utilisateurs envoyés en télétravail</p>
<div>
	<div class="modalContainer" style="display: block;">
	<div class="modalBox">
		<h2>Formulaire d'ajout utilisateur</h2>
		<p>Vous allez enregistre un nouvel utilisateur </p>
		<a class="modalCloseBt" href="#">x</a>
	<form method="POST" action="<?php echo WEBROOT.'saveuser/';?>">
		
		<label>Nom</label>
		<input type="text" name="userLastName">
		<br>
		<label>Prénom(s)</label>
		<input type="text" name="userFirstName"><br>
		<label>Initial</label>
		<input type="text" name="userInitial"><br>
		<label>Matricule</label>
		<input type="text" name="userMatricule"><br>
		<label>Societe</label>
		<select name="userSociety">
			<option value="setex">SETEX</option>
			<option value="montecristo">MONTECRISTO</option>
		</select><br>
		<label>Service</label>
		<input type="text" name="userService"><br>
		<label>Téléphone</label>

		<input type="text" name="userPhone"><br>
		<label>Fournisseur d'accès</label>
		<select name="fai">
			<option value="Telma">Telma</option> 
			<option value="Airtel">Airtel</option> 
			<option value="Orange">Orange</option>
		</select><br>
		<label>Numero de série modem</label>
		<input type="text" name="numSerieModem"><br>

		<label>Numero de téléphone puce du modem</label>
		<input type="text" name="numPuceModem"><br>

		<label for="submitAddUserForm" class="submitBt">Enregistrer</label><input id="submitAddUserForm" type="submit" class="hide" name="" value="ajouter">
		<a class="submitBt" href="<?php echo WEBROOT.'users/';?>">Annuler</a>
	</form>
</div>
</div>
</div>