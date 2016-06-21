<?php

	include_once('Class/Competition.class.php');
	include_once('Class/Groups.class.php');

	$euro2016 = new Competition('Json/competition.json');

	echo 'Groupe '.$_GET['grp'].'<br/>';
	echo 'Match : '.$_GET['p1'].' - '.$_GET['p2'].'<br/>';
	echo 'Pronostic : '.$_POST['prScoreEq1'].' - '.$_POST['prScoreEq2'].'<br/>';

