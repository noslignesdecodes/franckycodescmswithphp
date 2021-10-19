<h1>all templates<a class="blueBt" href="#"><?php echo $totalInstalledTemplates;?></a></h1>

<h2>installed templates</h2>

<?php 
foreach($installedTemplates as $result)
{
$template=new AppTemplate($result['id']);
$templateId=$template->getAll('id');
?>
<article>
	<h2><?php echo $template->getAll('template_title');?></h2>
	<div class="cuteFooter">
	
<span class="greenBt">already installed</span>

<?php 
$template=new AppTemplate($templateId);

if($template->isDefault())
{
?>

<a href="<?php echo ADMINROOT.'/setdefaulttemplate/'.$templateId.'/';?>" class="greenBt">as default</a>
<?php 
}else{

	?>
<a href="<?php echo ADMINROOT.'/setdefaulttemplate/'.$templateId.'/';?>" class="blueBt">set default</a>

<?php 
}

?>

		
		<a href="<?php echo ADMINROOT.'/removetemplate/'.$template->getAll('id');?>" class="redBt">remove</a>

	</div>
</article>
<?php 
}
?>
<h2>all templates<a class="blueBt" href="#"><?php echo $totalInstalledTemplates+$totalTemplates;?></a></h2>
<?php 
foreach($templates as $result)
{ 
$file=new AppFile($result['id']);
?>
<article>
	<h2><?php echo $file->getAll('filetitle');?></h2>
	<div class="cuteFooter">
		<?php 
		if($templateId=isInstalled($file->getAll('id')))
		{
?>
<span class="greenBt">already installed</span>

<?php 
$template=new AppTemplate($templateId);

if($template->isDefault())
{
?>

<a href="<?php echo ADMINROOT.'/setdefaulttemplate/'.$templateId.'/';?>" class="greenBt">as default</a>
<?php 
}else{

	?>
<a href="<?php echo ADMINROOT.'/setdefaulttemplate/'.$templateId.'/';?>" class="blueBt">set default</a>

<?php 
}

?>
<?php 
		}else{
			?>
		
		<a href="<?php echo ADMINROOT.'/installtemplate/'.$file->getAll('id').'/';?>" class="blueBt">install</a> 
		<?php 
		}
		?>
		
		<a href="<?php echo ADMINROOT.'/removetemplate/'.$templateId;?>" class="redBt">remove</a>

	</div>
</article>
<?php
} 
 ?>