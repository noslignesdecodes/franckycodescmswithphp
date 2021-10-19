<section class="alignCenter">
	<h2>Recherche messages</h2>

	
		<br><br>
		<div class="blueBt"><?php echo $total;?> trouvé(s)</div>
	<div class="messageContent">
		<?php 
	foreach($all as $result)
	{

?> 
		<div class="inbox">
			<h2><a href="mailto:<?php echo $result['user_email'];?>"><?php echo $result['user_name'];?></a></h2>

			<div><?php echo $result['user_message'];?></div>
			<div class="alignRight">
				<a class="blueBt" href="mailto:<?php echo $result['user_email'];?>">Répondre</a>
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
	
</section>