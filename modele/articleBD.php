<?php

function ajout_article($id_auteur,$contenu) {
		require ("configSQL.php");
		//$contenu = htmlspecialchars(addslashes( $contenu )); 
		$req="INSERT INTO commentaires (ID_Auteur, Contenu) VALUES('%s', '%s')";
		$sql = sprintf ($req, $id_auteur, $contenu);
		mysqli_query($link,$sql)
			or die ('Erreur de requête : ' . $sql);
}
	
?>