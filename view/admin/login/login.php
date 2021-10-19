<div class="modalContainer" style="display: block;">
	<div class="modalBox">
		<div class="alignCenter">
			<h2 class="darkText">adminpanel</h2><br>
			<form class="loginForm" action="<?php echo ADMINROOT.'/newsession/';?>" method="POST">
				<label for=""  class="alignLeft">login</label>
				<input type="text" name="login"><br>
				<label for="" class="alignLeft" >password</label>
				<input type="password" name="password"><br><br><br>
				<label for="submitLogin" class="blueBt">login</label>
				<input type="submit" id="submitLogin" class="hide">
			</form>
		</div>
	</div>
</div>