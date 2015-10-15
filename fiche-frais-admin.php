<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrateur</title>

<link rel="shortcut icon" href="icone.ico">
<link href="fiche-frais.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div id="titre"> <span style="color:#67A4D3"><center><h1><b>Compte administrateur <?php
echo " ".$_SESSION['prenom']." ".$_SESSION['nom'];
?> <b></b></center></div>

<div id="fiche"> 
<div id="fiche3"> 
<form action ="index.php" method="POST">
					<input type="hidden" name="deco" value="ok">
					<input type="submit" value="Déconnexion" name="deco">
</form>					
</div>


<center>
			<table>
				<tr>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="Consulter_fiche_frais" value="ok">
							<input type="submit" value="Consulter les fiches de frais">
						</form>
					</td>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="modifier_fiche_frais" value="ok">
							<input type="submit" value="Modifier les fiches de frais">
						</form>
						
					</td>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="supprimer_admin" value="ok">
							<input type="submit" value="Supprimer les fiches de frais">
						</form>
					</td>
					</tr>
					<tr>
					<center><td><center>
						<form action ="index.php" method="POST">
							<input type="hidden" name="gerer_utilisateur" value="ok">
							<input type="submit" value="Gerer utilisateurs">
						</form>
					</center></td></center>
					</tr>
			</table>
			<center>
</div>
</body>
</html>
