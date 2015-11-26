<?php

function ajout_Article(){
	session_start();
	include("./controleur/verification.php");
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
				$msg = "Article ajouté !";
				$lien = "";
				$nomlien="";
				require("./vue/article/message.tpl");
			}	
		}
}

function afficher_Article(){
	require("./modele/articleBD.php");
	$lien=$_GET['lien'];
	$article=get_Article($lien);
	echo "<h1>".$article['Titre']."</h1>";
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
	$lien=$titre;
	$lien=str_replace(explode(' ', 'à á â ã ä ç è é ê ë ì í î ï ñ ò ó ô õ ö ù ú û ü ý ÿ À Á Â Ã Ä Ç È É Ê Ë Ì Í Î Ï Ñ Ò Ó Ô Õ Ö Ù Ú Û Ü Ý'),
                            explode(' ', 'a a a a a c e e e e i i i i n o o o o o u u u u y y A A A A A C E E E E I I I I N O O O O O U U U U Y'),
                            $lien);
	$lien = strtolower($lien); // on passe la chaine de caractère en minuscule
    $lien = preg_replace('#&[^;]+;#', '', $lien); // supprime les autres caractères
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