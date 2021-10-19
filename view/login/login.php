<div id="site-container">
	<h1>login GO TT</h1>


<div class="modalContainer" style="display: block;">
	<div class="modalBox">
		<h2>Login GO TT</h2>
		<p>Veuillez entrer votre login svp</p>
		<?php 

		if(isset($loginError))
		{
		?>
		<div class="errorPwd">
			Veuillez entrer le bon login svp
		</div>
		<?php
		}
		?>
		<form class="loginForm" action="<?php echo WEBROOT.'newsession';?>" method="POST">
			<label for="login">Login</label>
			<input type="text" name="login"><br>
			<label for="password">Password</label>
			<input type="password" name="password"><br>
			<label for="loginSubmitBt" class="submitBt">Login</label>
			<input type="submit" id="loginSubmitBt" value="submit" class="hide">
		</form>
	</div>
</div>
</div>