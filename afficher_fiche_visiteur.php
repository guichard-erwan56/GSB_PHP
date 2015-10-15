<html>
<body>
	<div id="fiche3">
		<?php

			
		echo "<table><tr><td colspan='3' ><b><center>Fiche de frais totaux du mois de ".$_SESSION['mois']." - Dernière modification le ".$fiche['dateModif']." </center></b></td></tr>

		<tr><td colspan='4'><hr></td></tr><tr><td width='400'>
		<center><b>Montant validé</b></center></td><td width='400'>
		<center><b>Etat</b></center></tr><tr></tr>" ;

		echo "<tr>";
		// on affiche les résultats

		echo "<td width='400'><center>".$fiche["montantValide"]." €</center></td>";
		echo "<td width='400'><center>".$fiche["libelle"]."</center></td>";
		echo "</tr><td colspan='4'><hr></td></tr></table>";

		?>
	</div>
	<div id="fiche2">
		<table>
			<tr>
				<td colspan='4'><b><center>Détails du forfait</center>
						<tr>
							<td colspan='4'><hr></td>
						</tr> </b></td>
			</tr>
			<tr>
				<td width='400'><b><center>Etape</center>
					</b> </td>
				<td width='400'><b><center>Frais Kilométrique</center>
					</b> </td>
				<td width='400'><b><center>Nuitée Hôtel</center>
					</b> </td>
				<td width='400'><b><center>Repas Restaurant</center>
					</b> </td>
			</tr>
			<tr>
				<td colspan='3'></td>
			</tr>
			<tr></tr>
			
			<?php 
				
			$etape = calculFrais("ETP");
			$kilo = calculFrais("KM");
			$nuit = calculFrais("NUI");
			$repas = calculFrais("REP");
				
			echo "<td width='400'><center>".$etape." €</center></td>";
			echo "<td width='400'><center>".$kilo." €</center></td>";
			echo "<td width='400'><center>".$nuit." €</center></td>";
			echo "<td width='400'><center>".$repas." €</center></td>";
			echo "</tr><td colspan='4'><hr></td></table>";
				
			?>
			
			</table>
			</div>
			
			<div id="fiche2">
			<table>
				<tr>
					<td colspan='3'><b><center>Détails hors-forfait</center>
					</b>
				
				
				
				
				
				<tr>
					<td colspan='3'><hr>
				
				
				<tr>
					<td width='600'><b><center>Libelle</center></b>
					</td>
					<td width='600'><b><center>Montant</center></b>
					</td>
					<td width='400'><b><center>Date</center></b>
				
				
				<tr>


					<?php Foreach ($horsForfait as $horsForfait): 
					
				echo '<tr>
					<td width="600"><center>'.$horsForfait['libelle'].'</center>
					
					<td width="600"><center>'.$horsForfait['montant'].' €</center>
					
					<td width="600"><center>'.$horsForfait['date'].'</center></td>
				</tr>
				';
					
				endforeach; ?>
				<tr>
					<td colspan='3'><hr>
				
</div>
</body>
</html>