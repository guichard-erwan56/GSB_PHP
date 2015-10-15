<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Appel de la fonction jquery pour vérifier la disponibilité de l'Id-->
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
</head>
<title>Document sans titre</title>
</head>

<body>
<!--Ouverture de la balise <div id ="fiche2"> -->

<div id="fiche2"> 
<!--Formulaire saisie visiteur, method="post"-->
<u>Gérer les visiteurs</u></b><br></br>
<form id="block1"action="fiche-frais-admin.php?p=gererusers" method="post" >
<?php
error_reporting(E_ALL^E_DEPRECATED);
	echo "Sélectionner l'utilisateur : ";
	echo '<select name="lst_visiteur">';
	$requete= "select *  from visiteur order by nom;";
	$resultat= mysql_query($requete);
	$ligne= mysql_fetch_assoc($resultat);
	if($ligne) {
		echo '<option selected value = "'.$ligne["id"].'">'.$ligne["nom"].'</option>';
		$ligne=mysql_fetch_assoc($resultat);
		while($ligne) {
			echo '<option value ="'.$ligne["id"].'">'.$ligne["nom"].'</option>';
			$ligne=mysql_fetch_assoc($resultat);
		}
	}
	
?>
<table>
<tr>

<input id="envoyer" name=btnmodif type="submit" value="Modifier" />
<input id="supprimer" name=btnsupp type="submit" value="Supprimer" />
<input id="creer" name=btncreer type="submit" value="Créer nouvel utilisateur" />
</form>
<br>
</tr>

</div>
</b>
<?php
error_reporting(E_ALL^E_DEPRECATED);
/*Si variable ($_SESSION['erreur']) existe alors effectuer la commande
Selon la valeur de ($_SESSION['erreur']), les commande sont différentes*/
if(isset($_SESSION['erreur'])){
if ($_SESSION['erreur'] == 1 ){
	 
	echo '<script language="JavaScript">
	alert("Les données ont bien été insérées.");
	</script>';
	 $_SESSION['erreur'] = 3 ;}
	 
if ($_SESSION['erreur'] == 2 ){
	 
	echo '<script language="JavaScript">
	alert("Les données ont bien été modifiées.");
	</script>';
	 $_SESSION['erreur'] = 3 ;}

if ($_SESSION['erreur'] == 4 ){
	 
	echo '<script language="JavaScript">
	alert("Les données ont bien été supprimées.");
	</script>';
	 $_SESSION['erreur'] = 3 ;}
	 
if ($_SESSION['erreur'] == 0 ){
 echo '<script language="JavaScript">
	alert("Vous devez remplir tout les champs pour pouvoir insérer de nouvelles données.");
	</script>';
 $_SESSION['erreur'] = 3 ;}
	}
?>

<?php	
if (isset($_POST['btnsupp'])){
$_SESSION['id']= $_POST['lst_visiteur'];
$idnom = $_POST['lst_visiteur'];
// Déclaration des requetes SQL
$sqlnom = 'select nom from visiteur where id ="'.$idnom.'"';
$sqlpre = 'select prenom from visiteur where id ="'.$idnom.'"';
// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$reqnom = mysql_query($sqlnom) or die('Erreur SQL !<br />'.$sqlnom.'<br />'.mysql_error());
$reqpre = mysql_query($sqlpre) or die('Erreur SQL !<br />'.$sqlpre.'<br />'.mysql_error());
$datanom = mysql_fetch_array($reqnom);
$datapre = mysql_fetch_array($reqpre);
mysql_free_result ($reqnom);
mysql_free_result ($reqpre);
mysql_close ();
?>
<div id="fiche2">
Etes vous sur de supprimer <?php echo $datanom['nom']; echo " ";echo $datapre['prenom'];?>?

<table>
<form id="blockoui"action="suppusers.php" method="post">
<input id="Oui" type="submit" value="Oui" />
 
</form>
<form id="blocknon"action="fiche-frais-admin.php?p=gererusers" method="post">
<input id="Non" type="submit" value="Non" /> </table>

</div>
</form>

<?php
}
?>	
<?php	
if (isset($_POST['btncreer'])){
?>
<div id="fiche2"> 
<!--Formulaire de saisie nouvel utilisateur sous forme de tableau -->
<form id="block2"action="creerusers.php" method="post" >
<table>
<br>
<tr>
<td width='600'>Nom</td>
<td width='600'><input id="new_nom" type="text" name="new_nom" maxlength="10" size="10" /></td></tr>
<tr>
<td width='600'>Prenom</td>
<td width='600'><input id="new_pre"  type="text" name="new_pre" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Adresse</td>
<td width='600'><input id="new_adr"  type="text" name="new_adr" maxlength="20" size="30"/></td></tr>
<tr>
<td width='600'>Ville</td>
<td width='600'><input id="new_vil"  type="text" name="new_vil" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Code Postal</td>
<td width='600'><input id="new_cp"  type="text" name="new_cp" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Date embauche (AAAA-MM-JJ)</td>
<td width='600'><input id="new_date"  type="text" name="new_date" maxlength="10" size="10"/></td></tr>
<tr>
<tr><td colspan='2'><hr></td></tr></table>
 <b><u><center>Identifiants </center></b></u>
<table>
<tr><td colspan='2'><hr></td></tr>
<tr>
<td width='600'>Id </td>
<td width='600'>
<div>
<input id="pseudo" type="text" name="pseudo" maxlength="10" size="10" />
<span id="msgbox" style="display:none"></span>
</div>

</td></tr>
<tr>
<tr>
<td width='600'>Login</td>
<td width='600'><input id="new_log" type="text" name="new_log" maxlength="10" size="10" /></td></tr>
<tr>
<td width='600'>Mot de passe</td>
<td width='600'><input id="new_mdp" type="text" name="new_mdp" maxlength="10" size="10" /></td></tr>
<tr>
<td width='600'>Administrateur</td>
<td width='600'><input id="chk_admi"  type="checkbox" name="chk_admi" value ="oui"/></td>
<tr>
<td width='600'>Comptable</td>
<td width='600'><input id="chk_comp"  type="checkbox" name="chk_comp" value ="oui"/></td>
<tr>
<td colspan='2'><input id="Envoyer" type="submit" value="Créer" /></td></tr></table>
</div>
</form>
<?php
}
?>
<?php
if (isset($_POST['btnmodif'])){
$_SESSION['id']= $_POST['lst_visiteur'];
$idnom = $_POST['lst_visiteur'];
// Déclaration des requetes SQL
$sqlnom = 'select nom from visiteur where id ="'.$idnom.'"';
$sqlpre = 'select prenom from visiteur where id ="'.$idnom.'"';
$sqllogin = 'select login from visiteur where id ="'.$idnom.'"';
$sqlmdp = 'select mdp from visiteur where id ="'.$idnom.'"';
$sqladr = 'select adresse from visiteur where id ="'.$idnom.'"';
$sqlcp = 'select cp from visiteur where id ="'.$idnom.'"';
$sqlville = 'select ville from visiteur where id ="'.$idnom.'"';
$sqldatemb = 'select dateEmbauche from visiteur where id ="'.$idnom.'"';
$sqladmi = 'select Administrateur from visiteur where id ="'.$idnom.'"';
$sqlcomp = 'select Comptable from visiteur where id ="'.$idnom.'"';


// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$reqnom = mysql_query($sqlnom) or die('Erreur SQL !<br />'.$sqlnom.'<br />'.mysql_error());
$reqpre = mysql_query($sqlpre) or die('Erreur SQL !<br />'.$sqlpre.'<br />'.mysql_error());
$reqlog = mysql_query($sqllogin) or die('Erreur SQL !<br />'.$sqllogin.'<br />'.mysql_error());
$reqmdp = mysql_query($sqlmdp) or die('Erreur SQL !<br />'.$sqlmdp.'<br />'.mysql_error());
$reqadr = mysql_query($sqladr) or die('Erreur SQL !<br />'.$sqladr.'<br />'.mysql_error());
$reqcp = mysql_query($sqlcp) or die('Erreur SQL !<br />'.$sqlcp.'<br />'.mysql_error());
$reqvil = mysql_query($sqlville) or die('Erreur SQL !<br />'.$sqlville.'<br />'.mysql_error());
$reqdat = mysql_query($sqldatemb) or die('Erreur SQL !<br />'.$sqldatemb.'<br />'.mysql_error());
$reqadmi = mysql_query($sqladmi) or die('Erreur SQL !<br />'.$sqladmi.'<br />'.mysql_error());
$reqcomp = mysql_query($sqlcomp) or die('Erreur SQL !<br />'.$sqlcomp.'<br />'.mysql_error());

// on recupere le resultat sous forme d'un tableau
$datanom = mysql_fetch_array($reqnom);
$datapre = mysql_fetch_array($reqpre);
$datalog = mysql_fetch_array($reqlog);
$datamdp = mysql_fetch_array($reqmdp);
$dataadr = mysql_fetch_array($reqadr);
$datacp = mysql_fetch_array($reqcp);
$datavil = mysql_fetch_array($reqvil);
$datadat = mysql_fetch_array($reqdat);
$dataadmi = mysql_fetch_array($reqadmi);
$datacomp= mysql_fetch_array($reqcomp);


// on libère l'espace mémoire alloué pour cette interrogation de la base
mysql_free_result ($reqnom);
mysql_free_result ($reqpre);
mysql_free_result ($reqlog);
mysql_free_result ($reqmdp);
mysql_free_result ($reqadr);
mysql_free_result ($reqcp);
mysql_free_result ($reqvil);
mysql_free_result ($reqdat);
mysql_free_result ($reqadmi);
mysql_free_result ($reqcomp);
$adrsql = $dataadr['adresse'];
mysql_close ();
?>

<div id="fiche2"> 
<!--Formulaire de saisie/modification "Frais forfait" sous forme de tableau -->
<form id="block2"action="modifierusers.php" method="post" >
<table>
 <b><center>Modification de <?php echo $datanom['nom']; echo " ";echo $datapre['prenom'];?></center></b> 
 <td colspan='2'><hr></td></tr>
<tr>
<td width='600'>Nom</td>
<td width='600'><input id="new_nom"  type="text" value=<?php echo $datanom['nom']; ?> name="new_nom" maxlength="10" size="10" /></td></tr>
<tr>
<td width='600'>Prenom </td>
<td width='600'><input id="new_pre"  type="text" value=<?php echo $datapre['prenom']; ?> name="new_pre" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Adresse </td>
<td width='600'><input id="new_adr"  type="text"  value=<?php echo '"'.$adrsql.'"'; ?> name="new_adr" maxlength="50" size="20"/></td></tr>
<tr>
<td width='600'>Ville</td>
<td width='600'><input id="new_vil"  type="text" value=<?php echo $datavil['ville']; ?> name="new_vil" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Code Postal</td>
<td width='600'><input id="new_cp"  type="text" value=<?php echo $datacp['cp']; ?> name="new_cp" maxlength="10" size="10"/></td></tr>
<tr>
<td width='600'>Date embauche (AAAA-MM-JJ)</td>
<td width='600'><input id="new_date"  type="text" value=<?php echo $datadat['dateEmbauche']; ?> name="new_date" maxlength="10" size="10"/></td></tr>
<tr>
<tr><td colspan='2'><hr></td></tr></table>
 <b><center>Identifiants </center></b>
<table>
<tr><td colspan='2'><hr></td></tr>
<tr>
<td width='600'>Login</td>
<td width='600'><input id="new_log" type="text" value=<?php echo $datalog['login']; ?> name="new_log" maxlength="10" size="10" /></td></tr>
<tr>
<td width='600'>Mot de passe</td>
<td width='600'><input id="new_mdp" type="text" value=<?php echo $datamdp['mdp']; ?> name="new_mdp" maxlength="10" size="10" /></td></tr>
<tr>
<td width='600'>Administrateur (<?php echo $dataadmi['Administrateur']; ?>)</td>
<?php if($dataadmi['Administrateur']=='oui'){
echo '<td width="600"><input id="chk_admi" checked="checked" type="checkbox" name="chk_admi" value ="oui"/></td>';}
if($dataadmi['Administrateur']=='non'){
echo '<td width="600"><input id="chk_admi" type="checkbox" name="chk_admi" value ="oui"/></td>';}
?>
<tr>
<td width='600'>Comptable (<?php echo $datacomp['Comptable']; ?>)</td>
<?php if($datacomp['Comptable']=='oui'){
echo '<td width="600"><input id="chk_comp" checked="checked" type="checkbox" name="chk_comp" value ="oui"/></td>';}
if($datacomp['Comptable']=='non'){
echo '<td width="600"><input id="chk_comp" type="checkbox" name="chk_comp" value ="oui"/></td>';}
 ?>
<tr>
<td colspan='2'><input id="Envoyer" type="submit" value="Modifier" /></td></tr></table>
</div>
</form>
<?php
}
?>



</div>
</body>
<!-- AJAX CHECK -->
<script type="text/javascript">
$("#pseudo").blur(function()
{
$("#msgbox").removeClass().addClass('messagebox').text('Check en cours...').fadeIn("slow");
$.post("check-pseudo.php" ,{ pseudo:$(this).val() } ,function(data)
{
if(data=='no')
{
$("#msgbox").fadeTo(200,0.1,function()
{
$(this).html('Cet Id est déjà pris').addClass('busy').fadeTo(900,1);
});
}
else
{
$("#msgbox").fadeTo(200,0.1,function()
{
$(this).html('Cet Id est disponible').addClass('dispo').fadeTo(900,1);
});
}
});
});
</script>
</html>h