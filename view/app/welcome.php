
<div class="welcomeAppContainer">


	<h1>Welcome to this cute cms</h1><br>
 

	<p>In order for us to continue, please fill the following requirements</p><br><br>
	<form action="<?php echo WEBROOT.'initapp/';?>" method="POST" class="welcomeAppForm">
		
		<label for="">Database name</label>
		<input type="text" name="dbname"><br>
		<label for="">User name</label>
		<input type="text" name="dbuser"><br>

		<label for="">User password</label>
		<input type="password" name="dbpassword"><br>
		<label for="">Host</label>
		<input type="text" name="dbhost"><br>
		<label for="submitInitAppBt" class="fullWidth alignCenter blueBt">ok</label>
		<input type="submit" id="submitInitAppBt" class="hide" value="continue">

	</form>
	<br>
	<div class="alignRight">Support the author <a href="mailto:franckywebdesign@gmail.com">by sending him an email</a></div>

</div>
 