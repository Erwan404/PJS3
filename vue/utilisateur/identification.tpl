<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Connexion Admin</title>
	</head>
	<body>
		
		<form action="index.php?controle=utilisateur&action=identification" method="post" id="form">
			<p><label>Pseudo : </label><input name="pseudo" value="<?php echo $pseudo; ?>" /> </p>
			<p><label>Mot de passe : </label><input name= "pass" value="<?php echo $pass; ?>" type="password"/></p>  
			<p><input type= "submit" value= "Connexion" /></p> 
			<div id ="merreur"><p> <?php echo $msg; ?> </p></div>   	
		</form>
		
	</body></html>
		