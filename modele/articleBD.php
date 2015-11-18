<?php

function add_Article($id_auteur, $contenu, $titre) {
		require ("configSQL.php");
		//$contenu = htmlspecialchars(addslashes( $contenu )); 
		$req="INSERT INTO commentaires (ID_Auteur, Date_Creation, Contenu, Titre) VALUES('%s', NOW(), '%s', '%s')";
		$sql = sprintf ($req, $id_auteur, $contenu, $titre);
		mysqli_query($link,$sql)
			or die ('Erreur de requête : ' . $sql);
}
	
?>