<?php

error_reporting(E_ALL^E_DEPRECATED);

function getLogin() {

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM  `visiteur` where login="'.$_SESSION['login'].'";');
	$result = $request->fetch();

	return $result;

}

function recherche() {

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');

	;
}

function getEtat(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM  etat ;');
	$result = $request->fetchAll();

	return $result;

}

function getVisiteurs($droits){ //récupère les tous les employés avec leurs infos

	if ($droits==2){

		$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
		$request = $db->query('SELECT id, nom FROM `visiteur` ORDER BY nom;');
		$result = $request->fetchAll();
	}elseif ($droits==1){
		
		$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
		$request = $db->query('SELECT id, nom FROM `visiteur` ORDER BY nom;');
		$result = $request->fetchAll();


	}

	return $result;

}

function getFicheFrais(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM  `fichefrais` ,  `etat` WHERE  `fichefrais`.`idEtat` =  `etat`.`id` and fichefrais.idVisiteur="'.$_SESSION["id_fiche"].'" and fichefrais.mois="'.$_SESSION["mois"].'";');
	$result = $request->fetch();

	return $result;

}
function getFicheFraisVisiteur(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM  `fichefrais` ,  `etat` WHERE  `fichefrais`.`idEtat` =  `etat`.`id` and fichefrais.idVisiteur="'.$_SESSION["id"].'" and fichefrais.mois="'.$_SESSION["mois"].'";');
	$result = $request->fetch();

	return $result;

}

function getLigneFraisForfaitETP(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM `lignefraisforfait`, `fraisforfait` where lignefraisforfait.idFraisForfait=fraisforfait.id and idVisiteur="'.$_SESSION["id_fiche"].'" and mois="'.$_SESSION["mois"].'" and idFraisForfait="ETP" ');
	$result = $request->fetch();

	return $result;

}

function getLigneFraisForfaitKM(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM `lignefraisforfait`, `fraisforfait` where lignefraisforfait.idFraisForfait=fraisforfait.id and idVisiteur="'.$_SESSION["id_fiche"].'" and mois="'.$_SESSION["mois"].'" and idFraisForfait="KM" ');
	$result = $request->fetch();

	return $result;

}

function getLigneFraisForfaitNUI(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM `lignefraisforfait`, `fraisforfait` where lignefraisforfait.idFraisForfait=fraisforfait.id and idVisiteur="'.$_SESSION["id_fiche"].'" and mois="'.$_SESSION["mois"].'" and idFraisForfait="NUI" ');
	$result = $request->fetch();

	return $result;

}

function getLigneFraisForfaitREP(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM  `lignefraisforfait`, `fraisforfait` where lignefraisforfait.idFraisForfait=fraisforfait.id and idVisiteur="'.$_SESSION["id_fiche"].'" and mois="'.$_SESSION["mois"].'" and idFraisForfait="REP";');
	$result = $request->fetch();

	return $result;

}

function getLigneFraisHorsForfait(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM `lignefraishorsforfait` where idVisiteur="'.$_SESSION['id_fiche'].'" AND mois = "'.$_SESSION['mois'].'" ORDER BY ID ASC;');
	$result = $request->fetchAll();

	return $result;

}

function getHorsForfait(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM lignefraishorsforfait where idVisiteur="'.$_SESSION['id_fiche'].'" AND mois = "'.$_SESSION['mois'].'";');
	$result = $request->fetchAll();

	return $result;

}

function getFraisForfait(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('SELECT * FROM fraisforfait');
	$result = $request->fetch();

	return $result;

}


function getMontantHorsForfait(){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	$request = $db->query('select SUM(montant) from lignefraishorsforfait where idVisiteur="'.$_SESSION["id_fiche"].'" and mois="'.$_SESSION["mois"].'";');
	$result = $request->fetch();

	return $result;

}


function updateFicheFrais($montant){

	$db = new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');

	$db->query('UPDATE fichefrais
			SET    montantValide = "'.$montant.'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
			AND mois = "'.$_SESSION['mois'].'";');

			$db->query('UPDATE fichefrais
					SET    dateModif = "'.date('Y-m-d').'"
					WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
					AND mois = "'.$_SESSION['mois'].'";');
	
}

function updateLigneFraisForfait(){
		$db= new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	
	$db->query('UPDATE lignefraisforfait
			SET    quantite = "'.$_POST['txtetp'].'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'" 
			AND mois = "'.$_SESSION['mois'].'"	
			AND idFraisForfait = "ETP";');
	
	$db->query('UPDATE lignefraisforfait
			SET    quantite = "'.$_POST['txtnui'].'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
			AND mois = "'.$_SESSION['mois'].'"
			AND idFraisForfait = "NUI";');
	
	$db->query('UPDATE lignefraisforfait
			SET    quantite = "'.$_POST['txtkil'].'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
			AND mois = "'.$_SESSION['mois'].'"
			AND idFraisForfait = "KM";');
	
	$db->query('UPDATE lignefraisforfait
			SET    quantite = "'.$_POST['txtrep'].'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
			AND mois = "'.$_SESSION['mois'].'"
			AND idFraisForfait = "REP";');
	
}
function updateLigneFraisHorsForfait(){
	
 	$db= new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
 	$sqlmin=$db->query('SELECT min(id) FROM `lignefraishorsforfait` where idVisiteur="'.$_SESSION['id_fiche'].'" AND mois = "'.$_SESSION['mois'].'";');
 	$sqlmax=$db->query('SELECT max(id) FROM `lignefraishorsforfait` where idVisiteur="'.$_SESSION['id_fiche'].'" AND mois = "'.$_SESSION['mois'].'";');
 	
 	$min=$sqlmin->fetch();
 	$max=$sqlmax->fetch();
 	
 	$j=1;
 	
 	for($i=$min["min(id)"] ; $i <= $max["max(id)"]; $i++){
 	
	$db->query('UPDATE lignefraishorsforfait
			SET    libelle = "'.$_POST["txtlibelle".$j].'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
			AND mois = "'.$_SESSION['mois'].'"
			AND id = "'.$i.'";');
		
	$db->query('UPDATE lignefraishorsforfait
			SET    date = "'.$_POST["txtdate".$j].'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
			AND mois = "'.$_SESSION['mois'].'"
			AND id = "'.$i.'";');
		
	$db->query('UPDATE lignefraishorsforfait
			SET    montant = "'.$_POST["txtmontant".$j].'"
			WHERE idVisiteur = "'.$_SESSION['id_fiche'].'"
			AND mois = "'.$_SESSION['mois'].'"
			AND id = "'.$i.'";');
	
	$j++;
	
 	}
 	
}
 	
function deleteFiche(){
	
	$db= new PDO('mysql:host=localhost;dbname=frais;charset=utf8', 'root', 'password');
	
	$db->query('delete FROM `lignefraisforfait`where idVisiteur="'.$_SESSION['id_fiche'].'" and mois="'.$_SESSION['mois'].'";');
	
	$db->query('delete FROM `lignefraishorsforfait`where idVisiteur="'.$_SESSION['id_fiche'].'" and mois="'.$_SESSION['mois'].'";');
		
	$db->query('delete FROM  `fichefrais` WHERE idVisiteur="'.$_SESSION['id_fiche'].'" and mois="'.$_SESSION['mois'].'";');
	
}
	
	


?>