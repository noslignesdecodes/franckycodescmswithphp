<div id="banner" class="banner">
    	<div class="images">
    		<input type="hidden" value="img/banner1.jpg"> 
    		<input type="hidden" value="img/banner2.jpg"> 
    		<input type="hidden" value="img/banner3.jpg">
    	</div>

    	<div class="bannerSlide2 relative" id="bannerSlide2" >
    	</div>
    	<div class="bannerSlide2Hidden hide">
    		<div class="slides">
    			<div class="bannerMessage"> 
    				<h2>promo</h2>
				<div>
	        		<img class="promoImg" src="<?php echo WEBROOT.'view/template/madauto/img';?>/actu/NISSAN-QASHQAI.jpg" alt="">
	        	</div>
    				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem amet excepturi officia</p>
    			</div>
    			<img src="<?php echo WEBROOT.'view/template/madauto/img';?>/banner1.jpg">
    		</div>
    		<div class="slides">
    			<div class="bannerMessage">
    			<h2>nos offres</h2> 
    			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem amet excepturi officia, ab, similique ratione eius deserunt aperiam dolor illum..</p>
    			</div>
    			<img src="<?php echo WEBROOT.'view/template/madauto/img';?>/banner2.jpg">
    		</div>
    		<div class="slides">
    			<div class="bannerMessage"> 
    				<h2>news letter</h2>
    				<form method="POST" action="">
    					<input type="text" name="msg" placeholder="votre email: franckywebdesign@gmail.com"><br>	<br>	
    				    <label for="submitNewsLetterBanner" class="redBt">recevoir les nouveautés</label>
                        <input type="submit" class="hide" id="submitNewsLetterBanner" value="soumettre">
                
    				</form>
    			</div>
    			<img src="<?php echo WEBROOT.'view/template/madauto/img';?>/banner3.jpg">
    		</div>
    		<div class="slides">
    			<div class="bannerMessage"> 
    				<h2>contactez-nous</h2>
    				<form class="contactFormBanner" method="POST" action="<?php WEBROOT.'sendmessage/';?>">
    					Nom<input type="text" name="msg" placeholder=""><br>	<br>	
    				    Email <input type="" name=""><br>	
    				    Message <div class="customEditor" contenteditable="true">
    				    	</div>

    				    <label for="submitContactBanner" class="redBt">Contactez-nous</label>
                        <input type="submit" class="hide" id="submitContactBanner" value="soumettre">
                
    				</form>
    			</div>
    			<img src="<?php echo WEBROOT.'view/template/madauto/img';?>/banner2.jpg">
    		</div>
    		<div class="slides">
    			<div class="bannerMessage"> 
    				<h2>Rechercher</h2>
    				<p>Rechercher un vehicule ou autres sur notre site</p>
    				<form class="searchFormBanner" method="GET" action="<?php echo WEBROOT.'search/';?>">
    					<input type="text" name="q" placeholder="voiture"><br>	<br>	
    				     
    				    <label for="submitSearchBanner" class="redBt">Rechercher</label>
                        <input type="submit" class="hide" id="submitSearchBanner" value="soumettre">
                
    				</form>
    			</div>
    			<img src="<?php echo WEBROOT.'view/template/madauto/img';?>/banner3.jpg">
    		</div>
    		<div class="slides">
    			<div class="bannerMessage"> 
    				<h2>Avis</h2>
    				<p>Dites-nous qu'en pensez-vous de notre service</p>
    				<form class="livresOrBanner" method="POST" action="<?php echo WEBROOT.'livresor/';?>">
    					<input type="text" name="content" value="6">/10<br>	<br>	
    				     
    				    <label for="submitAvisBanner" class="redBt">Enregistrer</label>
                        <input type="submit" class="hide" id="submitAvisBanner" value="soumettre">
                
    				</form>
    			</div>
    			<img src="<?php echo WEBROOT.'view/template/madauto/img';?>/banner2.jpg">
    		</div>
    	</div>
    	<!-- <div class="imgContainer">
    		<div class="slideBox">
    			
    		</div>
    		 <img src="<?php echo WEBROOT.'view/template/madauto/img';?>/banner2.jpg" alt=""> 
    	</div> -->
    	<div class="imgEffect">
    	</div>
    </div> 