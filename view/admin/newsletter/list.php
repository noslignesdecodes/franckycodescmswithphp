		
				
				
<h1>news letter<span class="blueBt"><?php echo $totalEmail;?></h1>

<div class="messageContent">
<?php 
foreach($email as $result)
{
?>

 

<div class="removeMessageContainer inbox">
			<h2><a href="mailto:<?php echo $result['user_email'];?>"><?php echo $result['user_email'];?></a></h2>

			<div><?php echo $result['user_email'];?></div>
			<div class="alignRight">
				<a class="blueBt" href="mailto:<?php echo $result['user_email'];?>">Envoyez un message</a>
				<a class="removeMessageBt redBt" href="<?php echo ADMINROOT.'/removenewsletter/'.$result['id'];?>">remove</a>
			</div>
</div>
 
<?php 

}
?>

</div>			