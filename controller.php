<?php

error_reporting(E_ALL^E_DEPRECATED);

include 'model.php';

function login() {

	$_SESSION['login']=$_POST['txtLog'];
	$_SESSION['mdp']=$_POST['txtPas'];

	$result = getLogin();

	//on sait jamais, a remettre les autres $session (supprimé pour la sécurité)
	$_SESSION['nom'] = $result["nom"];
	$_SESSION['prenom'] = $result["prenom"];
	$_SESSION['id'] = $result["id"];
	$_SESSION['Administrateur'] = $result["Administrateur"];
	$_SESSION['Comptable'] = $result["Comptable"];
	$_SESSION['reqpass']=$result["mdp"];

	if($_SESSION['login'] == ''){
			
		echo '<script language="JavaScript">
		alert("Login non valide. Merci de recommencer.");
		window.location.replace("log.php");
		</script>';

	} else {

		if(isset($_SESSION['mdp'])){

			$passe=$_SESSION['mdp'];

			if($passe == $_SESSION['reqpass']){
					
				$_SESSION['login'] = $_POST['txtLog'];
				$_SESSION['pwd'] = $_POST['txtPas'];
				$_SESSION['autorise'] = 1;
					
				if ($_SESSION['Administrateur'] == "oui") {
					$_SESSION["droits"]=1;

				}else if ($_SESSION['Comptable'] == "oui") {
					$_SESSION["droits"]=2;

				}else{
					$_SESSION["droits"]=3;

				}
					
			} else {

				echo '<script language="JavaScript">
				alert("Mot de passe non valide. Merci de recommencer.");
				window.location.replace("log.php");
				</script>';
			}
		}
	}

}

function deco() {

	$_SESSION=array();


}

function consulter_visiteur(){
	
	include("consulter.php");
	
}

//affichage du choix de consultation pour un mois et un visiteur de la part du comptable
function consulter_compt(){

	$list_consulter_compt = getVisiteurs(2);
	include("consulter_compt.php");

}

function modifier_compt(){

	$list_modifier_compt = getVisiteurs(2);
	include("modifier_compt.php");

}

function supprimer_compt(){

	$list_supprimer_compt = getVisiteurs(2);
	include("supprimer_compt.php");

}

function supprimer_fiche_compt(){
	
	deleteFiche();
	
	echo '<script language="JavaScript">
	alert("Les données ont bien été supprimmées.");
	</script>';
	
}

function nouvelle_donnee_visiteur(){

	$list_consulter_compt = getVisiteurs(3);
	include("consulter_compt.php");

}

function consulter_admin(){

	$list_consulter_admin = getVisiteurs(1);
	include ("consulter_admin.php");

}

function modifier_admin(){

	$list_modifier_admin = getVisiteurs(1);
	include ("modifier_admin.php");
}

function supprimer_admin(){

	$list_supprimer_admin = getVisiteurs(1);
	include ("supprimer_admin.php");
}

function gerer_admin(){

	$list_gerer_admin = getVisiteurs(1);
	include ("gerer_users.php");
	
}



function modifier_fiche_compt(){ // a finir

	updateLigneFraisForfait();

	$horsforfait = getHorsForfait();
	
	updateLigneFraisHorsForfait();

	// calul du montant forfait
	$montant = calculFrais("ETP") + calculFrais("KM") + calculFrais("NUI") + calculFrais("REP") + calculFrais("HF") ;


	updateFicheFrais($montant);
	
	echo '<script language="JavaScript">
	alert("Les données ont bien été modifiées.");
	</script>';

}


function calculFrais($ligne){

	$ETP = getLigneFraisForfaitETP();
	$KM = getLigneFraisForfaitKM();
	$NUI = getLigneFraisForfaitNUI();
	$REP = getLigneFraisForfaitREP();

	$HF = getMontantHorsForfait();

	if ($ligne=="ETP"){
		$frais = ($ETP["quantite"])*($ETP["montant"]);
	}else if($ligne=="KM"){
		$frais = ($KM["quantite"])*($KM["montant"]);
	}else if($ligne=="NUI"){
		$frais = ($NUI["quantite"])*($NUI["montant"]);
	}else if($ligne=="REP"){
		$frais = ($REP["quantite"])*($REP["montant"]);
	}else if($ligne=="HF"){
		$frais = ($HF["SUM(montant)"]);
	}else{
		echo "Erreur dans le calcul";
		$frais = 0;
	}

	return $frais;

}


function afficher_fiche($affichage){

	if ($affichage=="consulterCompt"){

		$_SESSION["mois"]=$_POST["mois"];
		$_SESSION["id_fiche"]=$_POST["lst_visiteur"];

		//on prend toutes les valeurs des fiches dans la table
		$fiche = getFicheFrais();
		//On prend toutes les lignes hors forfait
		$horsForfait = getLigneFraisHorsForfait();

		//verification de l'existence d'une fiche pour ce mois
		if (empty($fiche["dateModif"])){

			echo '<input type="hidden" name="consulter_compt" value="ok">';

			echo '<script language="JavaScript">
			alert("Aucune fiche pour ce mois et cet utilisateur. Merci de recommencer.");
			</script>';

		}else{

			include("afficher_fiche_compt.php");

		}
	}

	if ($affichage=="consulterAdmin"){

		$_SESSION["mois"]=$_POST["mois"];
		$_SESSION["id_fiche"]=$_POST["lst_visiteur"];

		//on prend toutes les valeurs des fiches dans la table
		$fiche = getFicheFrais();
		//On prend toutes les lignes hors forfait
		$horsForfait = getLigneFraisHorsForfait();

		//verification de l'existence d'une fiche pour ce mois
		if (empty($fiche["dateModif"])){

			echo '<input type="hidden" name="consulter_admin" value="ok">';

			echo '<script language="JavaScript">
			alert("Aucune fiche pour ce mois et cet utilisateur. Merci de recommencer.");
			</script>';

		}else{

			include("afficher_fiche_admin.php");

		}

	}


	if ($affichage=="modifierCompt"){

		$_SESSION["mois"]=$_POST["mois"];
		$_SESSION["id_fiche"]=$_POST["lst_visiteur"];

		//on prend toutes les valeurs des fiches dans la table
		$fiche = getFicheFrais();
		//on prend tous les états dans la table 'etat'
		$etat = getEtat();
		//On prend toutes les lignes hors forfait
		$horsForfait = getLigneFraisHorsForfait();

		//verification de l'existence d'une fiche pour ce mois
		if (empty($fiche["dateModif"])){

			echo '<input type="hidden" name="consulter_compt" value="ok">';

			echo '<script language="JavaScript">
			alert("Aucune fiche pour ce mois et cet utilisateur. Merci de recommencer.");
			</script>';

		}else{

			include("modifier_fiche_compt.php");

		}

	}
	
	if ($affichage=="consulterVisiteur"){
	
		$_SESSION["mois"]=$_POST["mois"];
		$_SESSION["id_fiche"]=$_SESSION["id"];
		
	
		//on prend toutes les valeurs des fiches dans la table
		$fiche = getFicheFrais();
		//on prend tous les états dans la table 'etat'
		$etat = getEtat();
		//On prend toutes les lignes hors forfait
		$horsForfait = getLigneFraisHorsForfait();
	
		//verification de l'existence d'une fiche pour ce mois
		if (empty($fiche["dateModif"])){
	
			echo '<input type="hidden" name="consulter_compt" value="ok">';
	
			echo '<script language="JavaScript">
			alert("Aucune fiche pour ce mois et cet utilisateur. Merci de recommencer.");
			</script>';
	
		}else{
	
			include("afficher_fiche_visiteur.php");
	
		}
	}
		
		if ($affichage=="nouvelleFiche"){
		
			$_SESSION["mois"]=$_POST["mois"];
			$_SESSION["id_fiche"]=$_SESSION["id"];
		
			include("nouvelle_fiche.php");
		
		}
	
	
	if ($affichage=="supprimerCompt"){
	
		$_SESSION["mois"]=$_POST["mois"];
		$_SESSION["id_fiche"]=$_POST["lst_visiteur"];
	
		//on prend toutes les valeurs des fiches dans la table
		$fiche = getFicheFrais();
		//On prend toutes les lignes hors forfait
		$horsForfait = getLigneFraisHorsForfait();
	
		//verification de l'existence d'une fiche pour ce mois
		if (empty($fiche["dateModif"])){
	
			echo '<input type="hidden" name="consulter_compt" value="ok">';
	
			echo '<script language="JavaScript">
			alert("Aucune fiche pour ce mois et cet utilisateur. Merci de recommencer.");
			</script>';
	
		}else{
	
			include("supprimer_fiche_compt.php");
	
		}
	}
	
	if ($affichage=="consulterCompt"){
	
		$_SESSION["mois"]=$_POST["mois"];
		$_SESSION["id_fiche"]=$_POST["lst_visiteur"];
	
		//on prend toutes les valeurs des fiches dans la table
		$fiche = getFicheFrais();
		//On prend toutes les lignes hors forfait
		$horsForfait = getLigneFraisHorsForfait();
	
		//verification de l'existence d'une fiche pour ce mois
		if (empty($fiche["dateModif"])){
	
			echo '<input type="hidden" name="consulter_compt" value="ok">';
	
			echo '<script language="JavaScript">
			alert("Aucune fiche pour ce mois et cet utilisateur. Merci de recommencer.");
			</script>';
	
		}else{
	
			include("afficher_fiche_compt.php");
	
		}
	}
}




function select_droits(){

	if ($_SESSION["droits"]==1){
		require('fiche-frais-admin.php');
	}else if ($_SESSION["droits"]==2){
		require('fiche-frais-compt.php');
	}else{
		require('fiche-frais.php');
	}

}


?>