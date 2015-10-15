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
$sql= 'Delete FROM visiteur Where id ="'.$id.'";';
$requete = mysql_query( $sql, $cnx ) or 
die("ERREUR MYSQL ".$id." numéro: ".mysql_errno()."
<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$erreur = 4;
$_SESSION['erreur'] = $erreur;
header('Location:fiche-frais-admin.php?p=gererusers');
?>
</body>
</html>