<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
<?php
error_reporting(E_ALL^E_DEPRECATED);
session_start ();


$cnx = mysql_connect( "localhost", "root", "password" );
//sélection de la base de données:
$db= mysql_select_db( "frais" );
//création de la requête SQL:
$new_id=$_POST['pseudo'];
$new_nom=$_POST['new_nom'];
$new_pre=$_POST['new_pre'];
$new_log=$_POST['new_log'];
$new_mdp=$_POST['new_mdp'];
$new_adr=$_POST['new_adr'];
$new_cp=$_POST['new_cp'];
$new_vil=$_POST['new_vil'];
$new_date=$_POST["new_date"];
$chk_admi=$_POST["chk_admi"];
$chk_comp=$_POST["chk_comp"];
if (empty($chk_admi)){$chk_admi="non";}
if (empty($chk_comp)){$chk_comp="non";}
if ($new_id != ""){
$sql = 'INSERT INTO  visiteur VALUES ("'.$new_id.'" ,"'.$new_nom.'" ,
"'.$new_pre.'" ,"'.$new_log.'" ,"'.$new_mdp.'" ,
"'.$new_adr.'" ,"'.$new_cp.'" ,"'.$new_vil.'" ,
"'.$new_date.'","'.$chk_admi.'","'.$chk_comp.'" )';
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$erreur = 1;
$_SESSION['erreur'] = $erreur;
header('Location:fiche-frais-admin.php?p=gererusers');

}else {
$erreur = 0;
$_SESSION['erreur'] = $erreur;
header('Location:fiche-frais-admin.php?p=gererusers');
 }
?>
</body>
</html>