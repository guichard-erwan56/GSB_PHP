<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans nom</title>
</head>

<body>
<!--Formulaire de selection du mois-->
<div id="fiche3"> 
<b><u>Création de fiche</u></b><br></br>
<form action="index.php" method="post" >
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


<br></br>
Nombre de frais hors forfait : 
<SELECT name="hf" size="1">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</SELECT><br>
<input type="hidden" name="nouvelles_donnees" value="ok">
<input type="hidden" name="nouvelle_fiche" value="ok">
<input type="submit" value="Valider" />
</form>
</div>

	<div id="fiche2">


<div id="fiche2"> 
<!--Formulaire de saisie "Quantité unitaire Frais forfait" sous forme de tableau -->
<form id="block1"action="consulterphp.php" method="post" >
<table><tr><td colspan='3'><td></td><b>Frais forfait <?php echo " ".$_SESSION['mois'] ?><hr></td></tr>
<tr><td width='600'>Type de frais</td><td></td><td width='600'>Nombre</tr></b><tr><td colspan='3'><hr></td></tr><td></td>
<tr>
<td width='600'>Nombre d'étapes</td><td></td>
<td width='600'><input id="quantiteEtape" type="text" name="txtQuantiteEtape" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'> Nombre de kilométres</td><td></td>
<td width='600'><input id="quantiteKilo"  type="text" name="txtQuantiteKilo" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Nombre de nuits à l'hôtel</td><td></td>
<td width='600'><input id="quantiteNuite"  type="text" name="txtQuantiteNuite" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Nombre de repas restaurant</td><td></td>
<td width='600'><input id="quantiteRepas"  type="text" name="txtQuantiteRepas" maxlength="10" size="10"/></td></tr>
<tr><td colspan='3'><hr></td></tr>
</div>
<!--Formulaire de saisie/modification "Quantité unitaire Hors forfait" sous forme de tableau-->
<div id="fiche2"> 


<?php
if ($_POST['nbrHf'] !=0){
echo '<tr><td colspan="3"><b>Frais hors forfait <?php echo " ".$_POST["mois"] ?><hr></td></tr>';
}

$nbr = $_POST['nbrHf'];
$_SESSION['nbrHf'] = $_POST['nbrHf'];
while ($nbr != 0){
	echo '
<tr><td width="600">Motif n°'.$nbr.' <td width="600">Montant n°'.$nbr.'<td width="600">Date - (AAAA-MM-JJ) </td></tr></b>
<tr>
<td width="600"><input id="txtlibelle'.$nbr.'"  type="text" name="txtlibelle'.$nbr.'" maxlength="10" size="10"/>
<td width="600"><input id="montant'.$nbr.'"  type="text" name="txtmontant'.$nbr.'" maxlength="10" size="10"/>
<td width="600"><input id="datehorsforfais'.$nbr.'"  type="text" name="datehorsforfais'.$nbr.'" maxlength="10" size="10"/>

</tr>';
$nbr = $nbr-1;
}
?>

<td colspan='3'><input id="envoyer" type="submit" value="Valider" /></td></tr></table>
</div>
</form>
<?php
if (isset($_POST['txtQuantiteEtape'])){
$date = date("d/m/y");
$mois = $_POST['mois'];

}


?> 
</body>
</html>
