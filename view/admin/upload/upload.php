<h1>upload</h1>

<div class="modalContainer" style="display: block;">
	<div class="modalBox">
		<div class="modalCloseBt">x</div>
<form class="uploadForm" id="uploadForm" action="<?php echo ADMINROOT.'/saveupload/';?>" method="POST" enctype="multipart/form-data" >

<label for="">Nom fichier</label><br>
<input type="text" id="filename" name="filename"> <br>
<label for="">Description</label><br>
<textarea name="description" id="description"></textarea><br>
<label for="mainFile" class="alignCenter fullWidth blueBt">Rechercher le fichier</label>
<input type="file" name="file" id="mainFile" class="hide">
<br><br>

<br>
<div class="alignLeft">
<input type="checkbox" name="app_template" value="1" style="width: 32px;min-width:32px;display: inline-block;vertical-align: top;"><label>template</label><br>
</div>
<label for="submitUploadForm" class="blueBt">upload</label>
<input type="submit" id="submitUploadForm" class="hide" value="">
</form>
</div>
</div>