<?php
	include_once ('Class/Groups.class.php');
	include_once ('Class/Teams.class.php');
	include_once ('Class/Competition.class.php');

	$euro2016 = new Competition('Json/competition.json');

	$euro2016->createGroupes();

	if (!isset($_GET['grp'])) {
		for ($i=0; $i<count($euro2016->getTabGroups()); $i++) {
			echo $euro2016->getTabGroups()[$i].'<br/>';
		}
	}
	else {
		for ($i=0; $i<count($euro2016->getTabGroups()); $i++) {
			if ($euro2016->getTabGroups()[$i]->getNomGroupe() == $_GET['grp']) {
				$euro2016->getTabGroups()[$i]->creationListeMatchs();
				for ($j=0; $j<count($euro2016->getTabGroups()[$i]->getTabRencontres()); $j++) {
					echo $euro2016->getTabGroups()[$i]->getTabRencontres()[$j].'<br/>';
				}
			}
		}
		echo '<a href="Euro2016.php">Retour à la liste</a>';
	}
