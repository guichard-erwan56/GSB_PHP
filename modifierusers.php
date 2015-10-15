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

$id=$_SESSION['id'];
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

$sql = 'UPDATE visiteur SET  Administrateur="'.$chk_admi.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );

$sql = 'UPDATE visiteur SET  Comptable="'.$chk_comp.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );


If (!empty($new_nom)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET nom="'.$new_nom.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die("ERREUR MYSQL ".$id." numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
If (!empty($new_pre)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET prenom="'.$new_pre.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
If (!empty($new_log)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET login="'.$new_log.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
If (!empty($new_mdp)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET mdp="'.$new_mdp.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
If (!empty($new_adr)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET adresse="'.$new_adr.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
If (!empty($new_cp)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET cp="'.$new_cp.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
If (!empty($new_vil)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET  ville="'.$new_vil.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
If (!empty($new_date)){//exécution de notre requête SQL:
$sql = 'UPDATE visiteur SET  dateEmbauche="'.$new_date.'" where id = "'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die( "ERREUR MYSQL numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}


$erreur = 2;
$_SESSION['erreur'] = $erreur;
header('Location:fiche-frais-admin.php?p=gererusers');

?>
</body>
</html>