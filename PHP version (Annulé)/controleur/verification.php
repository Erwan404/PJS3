<?php
	if(!isset($_SESSION['profil']))
	{
		//include("./vue/header.tpl");
		$type="erreur";
		$msg = "Vous n'êtes pas connecté au site. Vous n'avez pas accès à cette page.";
		$lien ="index.php?controle=utilisateur&action=accueil";
		$nomlien="Accueil";
		require("./vue/article/message.tpl");
		exit;
	}
?>