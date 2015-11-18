<!doctype html>
<html lang="fr">
	<head>
		<title>SocDUT</title>
		<script src="./javascript/jquery.js"></script>
	</head>
	<body>
		<article id="message">
			<div id ="m<?php echo $type; ?>"> <?php echo $msg; ?> </div>
			<div id ="lien"><a href="<?php echo $lien; ?>"><?php echo $nomlien; ?></a> </div>
		</article>
	</body></html>	