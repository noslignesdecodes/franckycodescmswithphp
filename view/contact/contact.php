 <div class="b7 centerBox">

 <h1>contactez-nous</h1><br>
<!--  <div class="toggleBt">...</div>
 <div class="toggleMenu">Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Explicabo, deleniti. Illo praesentium laboriosam a nisi rem obcaecati velit porro ipsum beatae quia esse et reprehenderit atque, saepe eos vitae repellat.</div> -->

 <?php 
 if(isset($messageSent))
 {

 	?>
<div class="success">
	Nous avons bien réçu votre message. Nous allons vous répondre le plutôt possible.
</div><br>
 	<?php 
 }

 ?>
 <form class="contactForm" method="POST" action="<?php echo WEBROOT.'savemessage/';?>">
           <label>Nom</label><input type="text" placeholder="Nom*" name="username"><br>
            <label>Email</label>    <input type="text" placeholder="Email*" name="email"><br>
            <label>Téléphone</label><input type="text" placeholder="Phone*" name="phone"><br>
           		  
	           
	        <label>Message</label><textarea name="message" class="messageEditor">Message*</textarea>
	          
	    
	            <label for="submitContactBt" class="fullWidth blueBt sendBt">envoyer</label>
	            <input type="submit" id="submitContactBt" class="hide">
</form>         
</div>  