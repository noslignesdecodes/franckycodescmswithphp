

<ul class="hide" style="background-color: white;z-index: 1200;position: absolute;" id="produit_category">
	<li>
		<div class="row">
			<div class="col-md-12"> 
				<a href="<?php echo WEBROOT.'voiture'?>">Voitures</a>
			</div>
			<div class="col-md-4"> 
				<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/car1.jpg" alt="image">
				<div class="text-center">
					<a href="#" class="text-center">XXXX</a>
				</div>
			</div>
			<div class="col-md-4"> 
					<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/car2.jpg" alt="image">
					<div class="text-center">
						<a class="text-center">XXXX</a>
					</div>
			</div>
			<div class="col-md-4"> 
					<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/car3.png" alt="image">
					<div class="text-center">
						<a class="text-center">XXXX</a>
					</div>
			</div>
			<a class="text-center" href="<?php echo WEBROOT.TEMPLATEROOT.'voitures'?>" id1="btn_offre">Voir tous les voiture</a>
		</div>
	</li>
	<li>
		<div class="row"> 
				<div class="col-12"><a href="#">Moto</a></div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/scooter1.jpg" alt="image">
						<div class="text-center">
							<a class="text-center">XXXX</a>
						</div>
				</div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/KTM_390_ADVENTURE-MY20-front-left.jpg" alt="image">
						<div class="text-center">
							<a class="text-center">XXXX</a>
						</div>
				</div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/2021-gas-gas-txt-racing-280-696x439.jpg" alt="image">
						<div class="text-center">
							<a class="text-center">XXXX</a>
						</div>
				</div>
		</div>	

	</li>
	<li>
		<div class="row"> 
				<div class="col-12"><a href="#">Energie</a></div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/scooter1.jpg" alt="image">
						<div class="text-center">
							<a class="text-center">XXXX</a>
						</div>
				</div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/KTM_390_ADVENTURE-MY20-front-left.jpg" alt="image">
						<div class="text-center">
							<a class="text-center">XXXX</a>
						</div>
				</div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/2021-gas-gas-txt-racing-280-696x439.jpg" alt="image">
						<div class="text-center">
							<a class="text-center">XXXX</a>
						</div>
				</div>
		</div>
		
	</li>
	<!-- <li>
		<div class="row"> 
				<div class="col-12"><a href="#">Marine</a></div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/scooter1.jpg" alt="image">
						<div class="text-center">
							XXXXXXXXX
						</div>
				</div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/KTM_390_ADVENTURE-MY20-front-left.jpg" alt="image">
						<div class="text-center">
							XXXXXXXXX
						</div>
				</div>
				<div class="col-md-4"> 
						<img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/2021-gas-gas-txt-racing-280-696x439.jpg" alt="image">
						<div class="text-center">
							XXXXXXXXX
						</div>
				</div>
		</div>
	</li> -->
</ul>
<div class="container">
	
</div>


<script type="text/javascript">
	let produit = document.getElementById("produit");
	let produit_category = document.getElementById("produit_category");
	produit.addEventListener("mouseover",() =>{produit_category.style.display="grid"});
	produit.addEventListener("mouseout",() =>{produit_category.style.display="none"});
	
</script>