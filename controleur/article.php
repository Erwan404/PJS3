<?php

function ajout_Article(){
	require("./modele/articleBD.php");
		$ID_Auteur="";
		$contenu="";
		$err=null; 
		$profil = array(); 
		$msg = "";
		
		if  (count($_POST)==0){
			require('vue/article/ajout_article.tpl');
		}
		else {
			$ID_Auteur=$_SESSION['profil']['ID_Utilisateur'];
			$contenu=$_POST['contenu'];
			if  ((! verifS_contenu($contenu,$err))) { 	
				$msg = (isset($err))?$err:$profil[0];
				require('vue/article/ajout_article.tpl');
			}
			else  { 
				ajout_article($id_nom,$contenu);
				$type="confirmation";
				$msg = "Article ajouté !";
				$lien ="index.php?controle=membre&action=page";
				$nomlien="Voir le mur";
				require("./vue/utilisateur/message.tpl");
			}	
		}
}

function verifS_contenu($contenu, &$err) {
		if (empty($contenu)) {
			$err = "La zone de texte est vide.";
			return false; 
		}
		return true;
}
	
?>