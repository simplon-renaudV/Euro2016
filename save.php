<?php

	include('PDO.php');

	require_once('autoload.php');
	use Classes\Competition;
	use Classes\Groups;
	use Classes\Rencontres;
	use Classes\Teams;

	$euro2016 = new Competition('Json/competition.json');

	$data = $bdd->prepare("INSERT INTO :tableSQL (groupe, pays1, pays2, score1, score2) VALUES (:groupe, :pays1, :pays2, :score1, :score2)");
	$data -> execute(array(
		'tableSQL' => $_GET['f'],
		'groupe' => $_GET['grp'],
        'pays1' => $_GET['p1'],
        'pays2' => $_GET['p2'],
        'score1' => $_POST['equipe1'],
        'score2' => $_POST['equipe2']
    ));

