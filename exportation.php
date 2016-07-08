<?php
	include_once('PDO.php');

	$requete = $bdd->query('SELECT * FROM Pronostics');
	$tabPronostics=[];

	while ($donnees = $requete->fetch()) {
		$groupe = $donnees['groupe'];
		$pays1 = $donnees['pays1'];
		$pays2 = $donnees['pays2'];
		$score1 = $donnees['score1'];
		$score2 = $donnees['score2'];

		array_push($tabPronostics, ['groupe'=>$groupe, 'pays1'=>$pays1, 'pays2'=>$pays2, 'score1'=>$score1, 'score2'=>$score2]);
	}

	$jsonPronostics = json_encode($tabPronostics);

	file_put_contents('Exports/pronostics.json', $jsonPronostics);