<h1>creer une page</h1>


<form method="POST" action="<?php echo ADMINROOT.'/createpage/';?>" >
	
<label for="">Nom de la page</label>
<input type="text" name="pagename"><br>

<br><br>
<!-- <label for="">Folder path</label>
<input type="text" name="folderPath" value="/model/"><br> -->
<label for="">Description de la page</label>
<textarea name="content" > 
 &lt;?php
$title='Admin Files';
$header='view/users/mg/header/header.php';
$core='view/admin/files/files.php';
$footer='view/users/mg/footer/footer.php';
$css='view/users/mg/css/css.php';
$js='view/users/mg/js/js.php';
$description='add description here';

$someMenu='view/users/mg/somemenu.php'; 

$pagination=new AppPagination(ADMINROOT.'/files', 'page', 'xyz', $totalFiles);

 
include ADMIN_PANEL_TEMPLATE;
?&gt;
</textarea>
<br> 
<div>
	<?php if(isset($pageCreated)) {

	?>
	<span class="success">
		Page created successfully
	</span>
	<?php 
	}else{

	?>
	<span class="error">Hey, Page are created automatically within /model/admin/ and /view/admin/</span>

<?php 

}
?>
</div>
<label for="submitNewPage"class="blueBt">creer</label>
<input type="submit" id="submitNewPage" class="hide">

</form>