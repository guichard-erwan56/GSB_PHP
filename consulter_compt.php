<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consulter Comptable</title>
</head>

<body>
	<!--Formulaire de selection du mois-->
	<div id="fiche2">
		<form id="block2" action="index.php" method="post">
			<input type="hidden" name="consulter_compt" value="ok"> <input
				type="hidden" name="afficher_fiche" value="ok"> <u>Consultation</u>
			<br>S&eacute;lectionner un mois : <SELECT name="mois" size="1">
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
			</SELECT> <br> S&eacute;lectionnez un visiteur : <select name="lst_visiteur">
				<?php Foreach ($list_consulter_compt as $list_consulter_compt): ?>

				<option value=<?php echo $list_consulter_compt['id']; ?>>
					<?php echo $list_consulter_compt['nom']; ?></option>

				<?php endforeach;	?>
			</select><br> <input id="envoyer" type="submit" value="Valider" /><br>
	
	</div>
	</form>
</body>
</html>
