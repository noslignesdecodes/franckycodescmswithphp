<h1>historique</h1>
<p>Voici l'historique de rapatriement et d'envoi télétravail de materiels et utilisateurs</p><br><br>


<div class="modalContainer" style="display: block;">
	<div class="modalBox">
		<a href="#" class="modalCloseBt">x</a>
		<h2>Bienvenue sur la page historique</h2>
		<p>L'historique enregistre les historiques des personnes et materiels en Télétravail</p>
	</div>
</div>

<div class="timelines">
	<?php 

	foreach ($timeline as $result) {
	?>
	<div class="someTimeline">
		
		<?php 
		switch($result['h_categorie'])
		{
			case 'retour utilisateur tt':

			$user=new User($result['id_concerne']);
			?>
	<p><a href="<?php echo WEBROOT.'updateuser/'.$user->getAll('id');?>"><?php echo $user->getName();?></a> n'est plus en Télétravail, on lui souhaite bon retour parmis nous</p>
			<?php 

			break;
			case 'envoi materiel tt':
			$material=new Material($result['id_concerne']);
	?>
	<p>Nous venons d'enregister un nouveau materiel envoyé en télétravail, un <strong><?php echo $material->getAll('type_materiel');?></strong></p>
	<?php
			break;
			case 'envoi utilisateur tt';

			$user=new User($result['id_concerne']);
	?>
	<p>Un utilisateur <strong><?php echo $user->getName();?></strong> vient de partir en télétravail, souhaitons-lui bon courage et bonne chance</p>
	<?php
			break;
			default:
	?>
		<p>Historique de  <strong><?php echo $result['h_categorie'];?></strong></p>
	<?php
			break;
		}
		?>
		<p><a href="<?php echo WEBROOT.'removefromtimeline/'.$result['id'];?>">effacer</a></p>
	</div>
	<?php
	}
	$pagination->googleLike(); //display pagination buttons
	?>
</div>