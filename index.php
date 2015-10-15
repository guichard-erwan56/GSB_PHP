<script type="text/javascript">

function insertion(){
alert("Données bien insérées !");
}
</script>
<?php

if (!session_id()){

	session_start();

}

include('controller.php');


if(isset($_POST['txtLog'])){

	login();

}

if (isset($_POST["deco"])){

	deco();

}

if (isset($_SESSION['autorise'])){

	if ($_SESSION["droits"]==1){
		require('fiche-frais-admin.php');
	}else if ($_SESSION["droits"]==2){
		require('fiche-frais-compt.php');
	}else{
		require('fiche-frais.php');
	}
	//Attention mettre les page de modif/consult


}else{

	$_SESSION=Array();
	require('log.php');

}

//Fiche frais comptable
if (isset($_POST["consulter_compt"])){

	consulter_compt();

	if (isset($_POST["afficher_fiche"])){

		afficher_fiche("consulterCompt");

	}
}

if (isset($_POST["modifier_compt"])){

	modifier_compt();

	if (isset($_POST["modifier_fiche"])){

		afficher_fiche("modifierCompt");

	}

}

if (isset($_POST["update_fiche_compt"])){

	modifier_fiche_compt();

}

if (isset($_POST["supprimer_compt"])){

	supprimer_compt();

	if (isset($_POST["supprimer_fiche_compt"])){

		afficher_fiche("supprimerCompt");

	}

}

if (isset($_POST["delete_fiche_compt"])){

	supprimer_fiche_compt();

}

//Fiche frais admin
if (isset($_POST["Consulter_fiche_frais"])){

	consulter_admin();

	if (isset($_POST["afficher_fiche"])){

		afficher_fiche("consulterAdmin");
	}

}

if (isset($_POST["gerer_utilisateur"])){

	include("gerer-users.php");


}

if (isset($_POST["supprimer_admin"])){

	supprimer_admin();

}

if (isset($_POST["modifier_fiche_frais"])){

	modifier_admin();

	if (isset($_POST["modifier_fiche"])){

		afficher_fiche("modifierAdmin");

	}


}

//Fiche frais visiteur
if (isset($_POST["consulter_visiteur"])){

	consulter_visiteur();

	if (isset($_POST["afficher_fiche"])){

		afficher_fiche("consulterVisiteur");

	}

}

if (isset($_POST["nouvelles_donnees"])){

	include("nouvelles_donees.php");

	if (isset($_POST["nouvelle_fiche"])){
		

		afficher_fiche("nouvelleFiche");

	}

}


//var_dump($_SESSION);

?>