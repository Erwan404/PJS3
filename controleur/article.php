<?php
session_start();

include("./controleur/verification.php");

function ajout_Article(){
	require("./modele/articleBD.php");
		$ID_Auteur="";
		$contenu="";
		$err=null; 
		$profil = array(); 
		$msg = "";
		$titre = "";
		
		if  (count($_POST)==0){
			require('vue/article/ajout_article.tpl');
		}
		else {
			$ID_Auteur=$_SESSION['profil']['ID_Utilisateur'];
			$contenu=$_POST['contenu'];
			$titre=$_POST['titre'];
			if  ((! verif_Contenu($contenu,$err)) || (! verif_Titre($titre,$err))) { 	
				$msg = (isset($err))?$err:$profil[0];
				require('vue/article/ajout_article.tpl');
			}
			else  { 
				add_Article($ID_Auteur,$contenu, $titre);
				$type="confirmation";
				$msg = "Article ajouté!";
				$lien = "";
				$nomlien="";
				require("./vue/article/message.tpl");
			}	
		}
}

function verif_Contenu($contenu, &$err) {
		if (empty($contenu)) {
			$err = "La zone de texte est vide.";
			return false; 
		}
		return true;
}

function verif_Titre($titre, &$err) {
		if (empty($titre)) {
			$err = "Le titre est vide.";
			return false; 
		}
		return true;
}
		
?>