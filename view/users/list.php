<h1>liste des utilisateurs</h1>

<p><strong>Hello</strong>! Voici la liste des utilisateurs envoyés en télétravail.</p>


<div class="modalContainer" style="display: block;">
	<div class="modalBox">
		<a href="#" class="modalCloseBt">x</a>
		<h2>Voici la liste des utilisateurs envoyés en Télétravail</h2>
		<p>Bienvenue</p>
	</div>
</div>
<table>
<tr>
	<th>Nom</th> 
	<th>Initial</th>
	<th>Téléphone</th>
	<th>Matricule</th>
	<th>Societe</th>
	<th>Service</th>
	<th>Date envoi TT</th>
	<th>En Télétravail</th>
	<th>Date rapatriement TT</th>

	<th>FAI</th>
	<th>Serie Modem</th>
	<th>Puce Modem</th>
	<th>operations</th>
</tr>

<?php

foreach($listUsers as $result)
{

?>
<tr>
	<td><a id="id<?php echo $result['id'];?>" href="<?php echo WEBROOT.'updateuser/'.$result['id'];?>"><?php echo $result['nom']. ' '.$result['prenoms'];?></a></td>
	<td><?php echo $result['u_initial'];?></td>
	<td><?php echo $result['numtelephone'];?></td>
	<td><?php echo $result['matricule'];?></td> 
	<td><?php echo $result['u_societe'];?></td>
	<td><?php echo $result['u_service'];?></td>
	<td><?php echo $result['envoi_tt'];?></td> 

	<td><?php 

	if($result['is_returned'])
	{
?>
Non plus
<?php 
	}else{
		?>
		Oui, toujours
		<?php 
	}
?></td> 

	<td><?php echo $result['rapatriement_tt'];?></td>
	 
	<td><?php echo $result['u_fai']; ?></td> 
	<td><?php echo $result['num_serie_modem']; ?></td>
	<td><?php echo $result['num_puce_modem']; ?></td>
	<td><a href="<?php echo WEBROOT.'updateusers/'.$result['id'];?>">update</a>
		<a href="<?php echo WEBROOT.'removeuser/'.$result['id'];?>">effacer</a>
		<a href="<?php echo WEBROOT.'returnuser/'.$result['id'];?>">rapatrier</a>
	</td>
</tr>

<?php
}


?>
</table>
