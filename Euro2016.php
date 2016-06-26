<!DOCTYPE html>
<html>
<head>
	<title>Euro 2016</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php

	require_once('autoload.php');

	use Classes\Competition;
	use Classes\Rencontres;
	use Classes\Teams;

	include_once('affichage.php');

	$euro2016 = new Competition('Json/competition.json');

	// si il n'y a pas d'equipes en paramètres get, affiche la liste des groupes
	if (!isset($_GET['grp'])) {
		for ($i=0; $i<count($euro2016->getTabGroups()); $i++) {
			$groupe = $euro2016->getTabGroups()[$i];
			afficheGroupe($groupe).'<br/>';
		}
	}

	// sinon on affiche la liste des matchs du groupe
	else {
		rencontres($euro2016);
		echo '<br/><a href="Euro2016.php">Retour à la liste</a>';
	}
?>

</body>
</html>