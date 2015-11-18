<?php
session_start();

include("./controleur/verification.php");


function home(){
	echo "Accueil de l'interface d'administration";
}
function logout(){
		session_unset ();
		session_destroy ();
		header ("Location:index.php?controle=utilisateur&action=accueil");
}

?>