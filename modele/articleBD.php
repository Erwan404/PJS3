<?php

function add_Article($id_auteur, $contenu, $titre, $lien) {
	
		require ("./modele/configSQL.php");
		//$contenu = htmlspecialchars(addslashes( $contenu )); 
		$req="INSERT INTO articles (ID_Auteur, Date_Creation, Contenu, Titre, Nom_Lien) VALUES('%s', NOW(), '%s', '%s', '%s')";
		$sql = sprintf ($req, $id_auteur, $contenu, $titre, $lien);
		mysqli_query($link,$sql)
			or die ('Erreur de requête : ' . $sql);
}
	
function get_Articles(){
	require ("./modele/configSQL.php");
	$req="SELECT * FROM articles;";
	$res = mysqli_query($link,$req)
			or die ('Erreur de requete : '. $sql);
	while($rows=mysqli_fetch_assoc($res)){	
			$commentaires[]=$rows;
	}	
	if (mysqli_num_rows($res)>0) {
		return $commentaires;
	}	
	else {
		return false;
	}
}

function get_Article($lien){
	require ("./modele/configSQL.php") ; 
		$req= "SELECT *  FROM articles WHERE Nom_Lien='%s';";
		$sql = sprintf ($req, $lien);
		$res = mysqli_query($link,$sql)
			or die ('Erreur de requete : ' . $sql);
		if (mysqli_num_rows($res)>0) {
			$article=mysqli_fetch_assoc($res);
			return $article;
		}	
		else {
			return false;
		}
}		
?>