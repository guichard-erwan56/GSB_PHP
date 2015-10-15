<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>
<body>
	<!--Ouverture de la balise <div id ="fiche2"> -->
	<div id="fiche2">
		<!--Formulaire saisie mois, method="post" action="index.php"-->
		<form id="block1" action="index.php" method="post">
			<u>Suppression</u></b><br> <br> S&eacute;lectionner un mois : <SELECT
				name="mois" size="1">
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
				
			</SELECT> <br>S&eacute;lectionnez un visiteur :
			<input type="hidden" name="supprimer_compt" value="ok">
			<input type="hidden" name="supprimer_fiche_compt" value="ok">
			<select name="lst_visiteur">
			<?php Foreach ($list_supprimer_compt as $list_supprimer_compt): ?>
			
			<option value=<?php echo $list_supprimer_compt['id']; ?>>
								<?php echo $list_supprimer_compt['nom']; ?></option>
			
			<?php endforeach;	?>

			
			<br><input id="envoyer" type="submit" value="Valider" />
		</form>
		
	</div>
</body>
</html>




<!-- echo '<script language="JavaScript"> -->
<!-- 	alert("Les données ont bien été supprimées."); -->
<!-- 	window.location.replace("fiche-frais-compt.php"); -->
<!-- 	</script>'; -->

