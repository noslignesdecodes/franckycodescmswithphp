<h1>Mis à jour information <a href="<?php echo WEBROOT.'updateuser/'.$mainUser['id'];?>"><?php echo $user->getName();?></a></h1>

<form method="POST" action="<?php echo WEBROOT.'saveupdateuser/';?>">
	
		<label>Nom</label>
		<input type="text" name="userLastName" value="<?php echo $user->getAll('nom');?>">
		<br>
		<label>Prénom(s)</label>
		<input type="text" name="userFirstName" value="<?php echo $user->getAll('prenoms');?>"><br>
		<label>Votre initial</label>
		<input type="text" name="userInitial" value="<?php echo $user->getAll('u_initial');?>"><br>
		<label>Matricule</label>
		<input type="text" name="userMatricule" value="<?php echo $user->getAll('matricule');?>"><br>
		<label>Societe</label>
		<select name="userSociety">
			<option value="setex">SETEX</option>
			<option value="montecristo">MONTECRISTO</option>
		</select><br>
		<label>Service</label>
		<input type="text" name="userService" value="<?php echo $user->getAll('u_service');?>"><br>
		<label>Téléphone</label>

		<input type="text" name="userPhone" value="<?php echo $user->getAll('numtelephone');?>"><br>

		<label>Fournisseur d'accès</label>
		<select name="fai">
			<option value="Telma">Telma</option> 
			<option value="Airtel">Airtel</option> 
			<option value="Orange">Orange</option>
		</select><br>
		<label>Numero de série modem</label>
		<input type="text" name="numSerieModem" value="<?php echo $user->getAll('num_serie_modem');?>"><br>

		<label>Numero de téléphone puce du modem</label>
		<input type="text" name="numPuceModem" value="<?php echo $user->getAll('num_puce_modem');?>"><br>


		<label for="submitAddUserForm" class="submitBt">Mettre à jour</label><input id="submitAddUserForm" type="submit" class="hide" name="" value="ajouter"><a href="<?php echo WEBROOT.'users/';?>" class="submitBt">Annuler</a>
		<input type="hidden" name="userId" value="<?php echo $user->getAll('id');?>">

</form>