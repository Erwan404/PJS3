<?php

function add_Article($id_auteur, $contenu, $titre, $lien) {
	
		require ("configSQL.php");
		//$contenu = htmlspecialchars(addslashes( $contenu )); 
		$req="INSERT INTO articles (ID_Auteur, Date_Creation, Contenu, Titre, Nom_Lien) VALUES('%s', NOW(), '%s', '%s', '%s')";
		$sql = sprintf ($req, $id_auteur, $contenu, $titre, $lien);
		mysqli_query($link,$sql)
			or die ('Erreur de requête : ' . $sql);
}
	
?>