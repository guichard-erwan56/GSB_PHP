<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>
<body>
<!--Ouverture de la balise <div id ="fiche2"> -->
<div id="fiche3"> 
<!--Formulaire saisie mois, method="post" action="fiche-frais-admin.php?p=modifier"-->
<form id="block1"action="index.php" method="post" >
<u>Modification</u></b><br><br>
Sélectionner le mois :
<SELECT name="mois" size="1">
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
</SELECT>
 <br>S&eacute;lectionnez un visiteur :
			<input type="hidden" name="modifier_compt" value="ok">
			<input type="hidden" name="modifier_fiche" value="ok">
			<select name="lst_visiteur">
			<?php Foreach ($list_modifier_admin as $list_modifier_admin): ?>
			
			<option value=<?php echo $list_modifier_admin['id']; ?>>
								<?php echo $list_modifier_admin['nom']; ?></option>
			
			<?php endforeach;	?>


<input id="envoyer" type="submit" value="Valider" />
</form>
<!--Déclaration saisie php-->


</div>
</body>
</html>