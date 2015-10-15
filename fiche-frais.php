<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Visiteur</title>
<link rel="shortcut icon" href="icone.ico">
<link href="fiche-frais.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="titre"> <span style="color:#67A4D3"><center><h1><b>Compte visiteur  <b>
<?php
echo " ".$_SESSION["prenom"]." ".$_SESSION["nom"];
?>
</b></center></div>



<div id="fiche"> 
<div id="fiche3"> 


<center>
			<table>
				<tr>
				<form action ="index.php" method="POST">
					<input type="hidden" name="deco" value="ok">
					<input type="submit" value="Déconnexion" name="deco" >
				</form>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="consulter_visiteur" value="ok">
							<input type="submit" value="Consulter les fiches de frais">
						</form>
					</td>
					<td>
						<form action ="index.php" method="POST">
							<input type="hidden" name="nouvelles_donnees" value="ok">
							<input type="submit" value="Nouvelles Données">
						</form>
					</td>
				</tr>
			</table>	
</div>



</div>

</body>
</html>
