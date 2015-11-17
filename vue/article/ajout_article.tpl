<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Ajout Commentaire</title>
	</head>
	<body>
		
		<form id="form" action="index.php?controle=article&action=ajout_Article" method="post">
			<p>Contenu : </br><TEXTAREA NAME="contenu" value="<?php echo $contenu; ?>" ROWS="5" COLS="50">
			</TEXTAREA></p>
			<input type= "submit" value= "Poster Commentaire" />  
			<div id ="merreur"><p> <?php echo $msg; ?> </p></div>  		
		</form>
	</body></html>			