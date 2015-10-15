<html>
<body>
	<div id="fiche2">
	<form action="index.php" method="POST">
		<?php

			
		echo "<table><tr><td colspan='3' ><b><center>Fiche de frais totaux du mois de ".$_SESSION['mois']." - Dernière modification le ".$fiche['dateModif']." </center></b></td></tr>

		<tr><td colspan='4'><hr></td></tr><tr><td width='400'>
		<center><b>Montant validé</b></center></td><td width='400'>
		<center><b>Etat</b></center></tr><tr></tr>" ;

		echo "<tr>";
		// on affiche les résultats

		echo "<td width='400'><center>".$fiche["montantValide"]." €</center></td>";
		echo "<td width='400'><center><select name='selectEtat'>";
		Foreach ($etat as $etat):
			
			echo '<option style="text-align:center" value= '.$etat['id'].'> '.$etat['libelle'].'</option>';
			
		endforeach;
		echo "</center></td></select>";
		echo "</tr><td colspan='4'><hr></td></tr></table>";

		?>
	</div>
	<div id="fiche2">
		<form action="index.php" method="POST">
			<table>
				<tr>
					<td colspan='4'><b><center>Détails du forfait</center>
							<tr>
								<td colspan='4'><hr>
								</td>
							</tr> </b>
					</td>
				</tr>
				<tr>
					<td width='400'><b><center>Etape</center> </b></td>
					<td width='400'><b><center>Frais Kilométrique</center> </b></td>
					<td width='400'><b><center>Nuitée Hôtel</center> </b></td>
					<td width='400'><b><center>Repas Restaurant</center> </b></td>
				</tr>
				<tr>
					<td colspan='3'></td>
				</tr>
				<tr></tr>

				<?php 

				$etape = getLigneFraisForfaitETP();
				$kilo =getLigneFraisForfaitKM();
				$nuit = getLigneFraisForfaitNUI();
				$repas = getLigneFraisForfaitREP();

				echo "<td width='400'><center><input name='txtetp' type='text' size='6' style='text-align:center' value=".$etape["quantite"]."></input></center></td>";
				echo "<td width='400'><center><input name='txtkil' type='text' size='6' style='text-align:center' value=".$kilo["quantite"]."></input></center></td>";
				echo "<td width='400'><center><input name='txtnui' type='text' size='6' style='text-align:center' value=".$nuit["quantite"]."></input></center></td>";
				echo "<td width='400'><center><input name='txtrep' type='text' size='6' style='text-align:center' value=".$repas["quantite"]."></input></center></td>";
				echo "</tr><td colspan='4'><hr></td></table>";

				?>

			</table>
	
	</div>

	<div id="fiche2">
		<table>
			<tr>
				<td colspan='3'><b><center>Détails hors-forfait</center> </b>
			
			<tr>
				<td colspan='3'><hr>
			
			<tr>
				<td width='600'><b><center>Libelle</center>
				</b></td>
				<td width='600'><b><center>Montant</center>
				</b></td>
				<td width='400'><b><center>Date</center>
				</b>
			
			<tr>

				<?php 
				
				$i=1;
				
				Foreach ($horsForfait as $horsForfait): 
				
				echo '<tr>
				<td width="600"><center><input name="txtlibelle'.$i.'" type="text" size="10" style="text-align:left" value='.$horsForfait['libelle'].'></input></center></td>
					
				<td width="600"><center><input name="txtmontant'.$i.'" type="text" size="6" style="text-align:center" value='.$horsForfait['montant'].'></input> €</center></td>
					
				<td width="600"><center><input name="txtdate'.$i.'" type="text" size="15" style="text-align:center" value='.$horsForfait['date'].'></input></center></td>
				</tr>
				';
					
				$i=$i+1;
				
				endforeach; ?>
			
			<tr>
				<td colspan='3'><hr>
					<p><br><center><input type="submit" size="6" value="Valider"></center>
					<input type="hidden" value="ok" name="update_fiche_compt">
					</form>

					</div>

</body>