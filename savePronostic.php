<?php
	include('PDO.php');
	include_once('Class/Competition.class.php');
	include_once('Class/Groups.class.php');

	$euro2016 = new Competition('Json/competition.json');

	$pronostic = $bdd->prepare("INSERT INTO Pronostics (groupe, pays1, pays2, pr1, pr2) VALUES (:groupe, :pays1, :pays2, :pr1, :pr2)");
	$pronostic->execute(array(
		'groupe'=>$_GET['grp'],
		'pays1'=>$_GET['p1'],
		'pays2'=>$_GET['p2'],
		'pr1'=>$_POST['prScoreEq1'],
		'pr2'=>$_POST['prScoreEq2']
	));

	echo 'Groupe '.$_GET['grp'].'<br/>';
	echo 'Match : '.$_GET['p1'].' - '.$_GET['p2'].'<br/>';
	echo 'Pronostic : '.$_POST['prScoreEq1'].' - '.$_POST['prScoreEq2'].'<br/>';

