<?php

function verif_Ident($pseudo, $pass, &$profil) {
		
		require ("configSQL.php");
		echo $pass;	
		$req= "SELECT Pseudo_Utilisateur, Pass_Utilisateur, ID_Utilisateur  FROM utilisateurs WHERE Pseudo_Utilisateur='%s' AND Pass_Utilisateur='%s' ;";
		$sql = sprintf ($req, $pseudo, $pass);
		$res = mysqli_query($link,$sql)
			or die ('Erreur de requete : ' . $sql);
		
			
		if (mysqli_num_rows($res)>0) {
			$profil=mysqli_fetch_assoc($res);
			
			return true;
		}	
		else {
			$profil[] = 'Erreur : profil non reconnu';
			return false;
		}	
}
	
?>