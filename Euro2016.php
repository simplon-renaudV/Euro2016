<!DOCTYPE html>
<html>
<head>
	<title>Euro 2016</title>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="UTF-8">
</head>
<body>

<?php

	require_once('autoload.php');
	include_once('affichage.php');
	include_once('PDO.php');

	use Classes\Competition;
	use Classes\Rencontres;
	use Classes\Teams;

	$euro2016 = new Competition('Json/competition.json');
	$euro2016->createBDD($bdd, $euro2016->getJson());

	// si il n'y a pas d'equipes en paramètres get, affiche la liste des groupes
	if (!isset($_GET['grp'])) {
		for ($i=0; $i<count($euro2016->getTabGroups()); $i++) {
			$groupe = $euro2016->getTabGroups()[$i];
			afficheGroupe($groupe).'<br/>';
		}
		echo '<a href="importation.php">Importation</a> / <a href="exportation.php">exportation</a>';
	}

	// sinon on affiche la liste des matchs du groupe
	else {
		rencontres($euro2016);
		echo '<br/><a href="Euro2016.php" class="retour">Retour à la liste</a>';
	}
?>

</body>
</html>