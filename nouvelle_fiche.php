<html>
<body>
	<div id="fiche2">
	<form action="index.php" method="POST">
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

				echo "<td width='400'><center><input name='txtetp' type='text' size='6' style='text-align:center'></input></center></td>";
				echo "<td width='400'><center><input name='txtkil' type='text' size='6' style='text-align:center'></input></center></td>";
				echo "<td width='400'><center><input name='txtnui' type='text' size='6' style='text-align:center'></input></center></td>";
				echo "<td width='400'><center><input name='txtrep' type='text' size='6' style='text-align:center'></input></center></td>";
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
				
				
				
				for($i=0 ; $i<=$_POST["hf"]; $i++){
				
				echo '<tr>
				<td width="600"><center><input name="txtlibelle'.$i.'" type="text" size="10" style="text-align:left"></input></center></td>
					
				<td width="600"><center><input name="txtmontant'.$i.'" type="text" size="6" style="text-align:center"></input> €</center></td>
					
				<td width="600"><center><input name="txtdate'.$i.'" type="text" size="15" style="text-align:center"></input></center></td>
				</tr>
				';
					
				}
				?>
			
			<tr>
				<td colspan='3'><hr>
					<p><br><center><input type="submit" size="6" value="Valider"></center>
					<input type="hidden" value="ok" name="update_fiche_compt">
					</form>

					</div>

</body>