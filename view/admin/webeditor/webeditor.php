		
<h1>web editor</h1>

<div class="modalContainer" style="display: block;">
	<div class="modalBox"  >
		<div class="modalCloseBt">x</div>
		<form class="saveWebEditorForm" method="POST" action="<?php echo ADMINROOT.'/savewebeditor/';?>">
			<label for="path">path:</label>
			<input type="text" name="editorpath" value="<?php echo $path;?>"><br>
			<label>contenu</label>
			<textarea class="basicEditor" name="editorcontent"  >
				
				<?php 
					// $content=str_replace('<textarea>', '<mytextarea>', $content);
					$content= str_replace('</textarea>', '</mytextarea>', $content);
						echo $content;
				?>
			</textarea>
		 
			<br>
			<label for="submitWebEditor" class="blueBt">save</label>
			<input type="submit" id="submitWebEditor" class="hide">
		</form>
	</div>
</div>