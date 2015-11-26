<?php
session_start();

include("./controleur/verification.php");


function home(){
	include("./vue/administration/page.tpl");
	require("./controleur/article.php");
	liste_Articles();
}
function logout(){
		session_unset ();
		session_destroy ();
		header ("Location:index.php?controle=utilisateur&action=accueil");
}

?>