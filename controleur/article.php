<?php
//session_start();

//include("./controleur/verification.php");

function ajout_Article(){
	require("./modele/articleBD.php");
		$ID_Auteur="";
		$contenu="";
		$err=null; 
		$profil = array(); 
		$msg = "";
		$titre = "";
		$lien= "";
		
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
				creation_Lien($titre, $lien);
				add_Article($ID_Auteur,$contenu, $titre, $lien);
				$type="confirmation";
				$msg = "Article ajouté!";
				$lien = "";
				$nomlien="";
				require("./vue/article/message.tpl");
			}	
		}
}

function afficher_Article(){
	require("./modele/articleBD.php");
	$lien=$_GET['lien'];
	echo $lien."   "; //Porblème avec le lien
	$article=get_Article($lien);
	echo $article['Titre'];
	echo $article['Contenu'];
}

function modifier_Article(){
	
}

function liste_Articles(){
	require("./modele/articleBD.php");
	$articles=get_Articles();
	foreach($articles as $art)
	{
		echo "<a href='index.php?controle=article&action=afficher_Article&lien=".$art['Nom_Lien']."'>".$art['Titre']."</a><br/>";
	}
}

function creation_Lien($titre, &$lien){
	$lien = strtolower($titre); // on passe la chaine de caractère en minuscule
	$lien = strtr($lien, "àäåâôöîïûüéè", "aaaaooiiuuee"); // on remplace les accents
	$lien = str_replace(' ', '-', $lien); // on remplace les espaces par des tirets
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