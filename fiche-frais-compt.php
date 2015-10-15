<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Comptable</title>
		<link rel="shortcut icon" href="icone.ico">
		<link href="fiche-frais.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="titre"> <span style="color:#67A4D3">
			<center><h1><b>Compte Comptable <?php
echo " ".$_SESSION['prenom']." ".$_SESSION['nom'];
?> </b></center>
		</div>

		<div id="fiche"> 
			<div id="fiche2"><br>
			
				<form action ="index.php" method="POST">
					<input type="hidden" name="deco" value="ok">
					<input type="submit" value="Déconnexion" name="deco" >
				</form>
				<br>
			</div>
			
			<center>
			<table>
				<tr>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="consulter_compt" value="ok">
							<input type="submit" value="Consulter les fiches de frais">
						</form>
					</td>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="modifier_compt" value="ok">
							<input type="submit" value="Modifier les fiches de frais">
						</form>
					</td>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="supprimer_compt" value="ok">
							<input type="submit" value="Supprimer les fiches de frais">
						</form>
					</td>
				</tr>
			</table>
			<center>
			
		</div>
	</body>
	
</html>