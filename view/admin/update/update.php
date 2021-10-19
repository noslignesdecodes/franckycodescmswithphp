				
								
								
								
								
								
				<h1>update</h1>

<form action="<?php echo ADMINROOT.'/saveupdate/';?>" method="POST">
<label>update site name</label>
<input type="text" name="appName" value="<?php echo $app['app_name'];?>">
<br>
<label>admin key</label>
<input type="text" name="adminkey" value="<?php echo $app['admin_key'];?>">
<br>
<label for="updateSubmitBt" class="alignCenter fullWidth blueBt">update</label>
<input type="submit" class="hide" id="updateSubmitBt"><br>
</form>
																					