		
<h1>guest book<span class="blueBt"><?php echo $totalGBook;?></span></h1>

 
<div class="messageContent">
	<?php 
	foreach($all as $result)
	{
	?> 
	<div class="removeMessageContainer inbox">
				<h2><a href="mailto:<?php echo $result['user_email'];?>"><?php echo $result['user_email'];?></a></h2>

				<div><?php echo $result['guest_comment'];?></div>
				<div>notes: <?php echo $result['user_note'];?></div>
				<div class="alignRight">
					<a class="blueBt" href="mailto:<?php echo $result['user_email'];?>">Envoyez un message</a>
					<a class="removeMessageBt redBt" href="<?php echo ADMINROOT.'/removeguestbook/'.$result['id'];?>">remove</a>
				</div>
	</div>

	<?php  
	} 
	?>
</div>
<div class="pagination">
<?php 
    $pagination->googleLike();
?>
</div>	