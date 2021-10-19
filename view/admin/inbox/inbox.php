<h1>Boîte de récéption <div class="blueBt"><?php echo TOTAL_MESSAGES;?></div></h1>

<div>Bienvenue dans votre boîte de récéption</div>

<div>Page <?php echo $pagination->getCurrent().'/'.$pagination->getTotalPages();?></div>
<div class="messageContent">
	
	<?php 

	foreach($inboxes as $result)
	{

?> 
		<div class="removeMessageContainer inbox">
			<h2><a href="mailto:<?php echo $result['user_email'];?>"><?php echo $result['user_name'];?></a></h2>

			<div><?php echo $result['user_message'];?></div>
			<div class="alignRight">
				<a class="blueBt" href="mailto:<?php echo $result['user_email'];?>">Répondre</a>
				<a class="removeMessageBt redBt" href="<?php echo ADMINROOT.'/removemessage/'.$result['id'];?>">remove</a>
			</div>
		</div>
<?php
 
	} ?>
</div>

<div class="pagination">
<?php 
	$pagination->googleLike();
?>
 </div>