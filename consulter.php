<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consulter Visiteur</title>
</head>

<body>
	<!--Formulaire de selection du mois-->
	<div id="fiche3">
		<b><u>Consultation</u> </b><br></br>
		<form id="block2" action="index.php" method="post">
		<input type="hidden" name="consulter_visiteur" value="ok">
		<input type="hidden" name="afficher_fiche" value="ok">
			Sélectionner le mois : <SELECT name="mois" size="1">
				<option value="janvie">Janvier</option>
				<option value="fevrie">Fevrier</option>
				<option value="mars">Mars</option>
				<option value="avril">Avril</option>
				<option value="mai">Mai</option>
				<option value="juin">Juin</option>
				<option value="juille">Juillet</option>
				<option value="aout">Aout</option>
				<option value="septem">Septembre</option>
				<option value="octobr">Octobre</option>
				<option value="novemb">Novembre</option>
				<option value="decemb">Decembre</option>
			</SELECT> <input id="envoyer" type="submit" value="Valider" />
		</form>
	</div>
</body>
</html>
