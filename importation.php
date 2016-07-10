<?php
	
	// récupère les pronostics depuis un fichier Json exporté
	include_once('PDO.php');

	$pronostics = json_decode(file_get_contents('Exports/pronostics.json'));

	for ($i=0; $i<count($pronostics); $i++) {
		$data = $bdd->prepare("INSERT INTO Pronostics (groupe, pays1, pays2, score1, score2) VALUES (:groupe, :pays1, :pays2, :score1, :score2)");
		$data -> execute(array(
		'groupe' => $pronostics[$i]->groupe,
        'pays1' => $pronostics[$i]->pays1,
        'pays2' => $pronostics[$i]->pays2,
        'score1' => $pronostics[$i]->score1,
        'score2' => $pronostics[$i]->score2
    ));

	}

?>