<?php

function accueil () {
		require('./vue/accueil.tpl');
	}
	
function identification () {
		include("./vue/header.tpl");
		$pseudo="";
		$pass="";
		$msg="";
		$err=null;  //(string) retour de la vérification syntaxique
		$profil = array(); //tableau : profil de l'utilisateur ou une chaîne d'erreur en position 0 
		session_start ();
		if ((isset($_SESSION['profil']))){ //Permet de rediriger la page connexion si user est déjà log
			header("Location:index.php?controle=administration&action=home");
		}
		if  (count($_POST)==0)
		require('./vue/utilisateur/identification.tpl') ;
		else {
            $pseudo=$_POST['pseudo'];
            $pass=$_POST['pass'];
			//echo $pass;
			require ("./modele/administrationBD.php");
			if  ((! verif_Pseudo($pseudo,$err)) || (!verif_Pass($pass, $pass, $err)) || (! verif_Ident($pseudo,$pass,$profil) )) {
				$msg = (isset($err))?$err:$profil[0];				
				require('./vue/utilisateur/identification.tpl') ;;
			}
			else  { 
				
				$_SESSION['profil']= $profil;
				header("Location:index.php?controle=administration&action=home");
			}
		}	
}

function verif_Pass($pass, $passc, &$err) {
		$modPass = "`^[[:alnum:][:punct:]]{6,20}$`";
		if (! preg_match($modPass,$pass)) {
			$err = "Mot de passe au format erroné (entre 6 et 20 caractères).";
			return false; 
		}
		if ($pass != $passc) {
			$err = "Les mots de passe ne correspondent pas.";
			return false; 
		}
		return true;
	}
	
function verif_Pseudo($pseudo, &$err) {
		$modPseudo = "`^[[:alpha:]\-]{0,30}$`";
		if (! preg_match($modPseudo,$pseudo)|| empty($pseudo)) {
			$err = "Nom au format erroné.";
			return false; 
		}
		return true;
	}
	
?>