<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
<?php
error_reporting(E_ALL^E_DEPRECATED);

//création de la requête SQL:
$datejour=date("y/m/d");
$mois = $_SESSION['mois'];
$montant = 0;
if ($_POST['txtQuantiteEtape'] != ""){
if ($_POST['txtQuantiteEtape'] != ""){
$sql = 'SELECT * FROM `fraisforfait`where id="ETP" ';
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$petape = mysql_fetch_array($requete);
$montant = $petape["montant"] * $_POST['txtQuantiteEtape'];
;
}
if ($_POST['txtQuantiteKilo'] != ""){
$sql = 'SELECT * FROM `fraisforfait`where id="KM" ';
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$pkilo = mysql_fetch_array($requete);
$montant = $montant + ($pkilo["montant"] * $_POST['txtQuantiteKilo']);
}

if ($_POST['txtQuantiteNuite'] != ""){
$sql = 'SELECT * FROM `fraisforfait`where id="NUI" ';
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$pnuit = mysql_fetch_array($requete);
$montant = $montant + ($pnuit["montant"] * $_POST['txtQuantiteNuite']);}


if ($_POST['txtQuantiteRepas'] != ""){
$sql = 'SELECT * FROM `fraisforfait`where id="REP" ';
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$prepas = mysql_fetch_array($requete);
$montant = $montant + ($prepas["montant"] * $_POST['txtQuantiteRepas']);
}

$justification = $_POST['txtlibelle'];
$etat ="CR";

$sql = 'SELECT * FROM  `fichefrais` ,  `etat` WHERE  `fichefrais`.`idEtat` =  `etat`.`id` and idVisiteur="'.$id.'" and mois="'.$mois.'";';
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$data = mysql_fetch_array($requete);

if (!isset($data["montant"])){
$sql = 'INSERT INTO  fichefrais VALUES ("'.$id.'" ,"'.$mois.'",
'.$montant.',"'.$datejour.'","'.$etat.'",'.$nbrHf.')';
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}

//Insert de la base de données
if ($_POST['txtQuantiteEtape'] != ""){
$montantETP = $_POST['txtQuantiteEtape'];
$sql = 'INSERT INTO  lignefraisforfait VALUES ("'.$id.'" ,"'.$mois.'" ,"ETP",'.$montantETP.')';
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}

if ($_POST['txtQuantiteKilo'] != ""){
$montantKM = $_POST['txtQuantiteKilo'];
$sql = 'INSERT INTO  lignefraisforfait VALUES ("'.$id.'" ,"'.$mois.'" ,"KM",'.$montantKM.')';
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}

if ($_POST['txtQuantiteNuite'] != ""){
$montantNUI = $_POST['txtQuantiteNuite'];
$sql = 'INSERT INTO  lignefraisforfait VALUES ("'.$id.'" ,"'.$mois.'" ,"NUI",'.$montantNUI.')';
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}

if ($_POST['txtQuantiteRepas'] != ""){
$montantREP = $_POST['txtQuantiteRepas'];
$sql = 'INSERT INTO  lignefraisforfait VALUES ("'.$id.'" ,"'.$mois.'" ,"REP",'.$montantREP.')';
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
}
// Boucle pour remplir les différente ligne de Hors forfait
while ($nbrboucle != 0){
$libelle = $_POST["txtlibelle".$nbrboucle];
$dateHf = $_POST["datehorsforfais".$nbrboucle];
$montantHf = $_POST["txtmontant".$nbrboucle];
$sql = 'INSERT INTO lignefraishorsforfait VALUES(DEFAULT,"'.$id.'" ,"'.$mois.'" ,"'.$libelle.'","'.$dateHf.'",'.$montantHf.')';
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$nbrboucle = $nbrboucle - 1 ;
$montant = $montant + $montantHf;



$sql = 'UPDATE fichefrais
	SET    montantValide = '.$montant.'
	WHERE idVisiteur = "'.$id.'"
	AND mois = "'.$mois.'";';
	$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$erreur = 0;
$_SESSION['erreur'] = $erreur;
header('Location:fiche-frais.php?p=nouvelle-donnees');

}
}
else {
$erreur = 1;
$_SESSION['erreur'] = $erreur;
header('Location:fiche-frais.php?p=nouvelle-donnees');
 }
?>
</body>
</html>