<?php
	include_once ('Class/Groups.class.php');
	include_once ('Class/Teams.class.php');
	include_once ('Class/Competition.class.php');

	$euro2016 = new Competition('Json/competition.json');

	// si il n'y a pas d'equipes en paramètres get, affiche la liste des groupes
	if (!isset($_GET['grp'])) {
		for ($i=0; $i<count($euro2016->getTabGroups()); $i++) {
			echo $euro2016->getTabGroups()[$i]->afficheGroupe().'<br/>';
		}
	}
	// sinon on affiche la liste des matchs du groupe en paramètre
	else {
		for ($i=0; $i<count($euro2016->getTabGroups()); $i++) {
			if ($euro2016->getTabGroups()[$i]->getNomGroupe() == $_GET['grp']) {
				
				for ($j=0; $j<count($euro2016->getTabGroups()[$i]->getTabRencontres()); $j++) {
					
					$pays1 = $euro2016->getTabGroups()[$i]->getTabRencontres()[$j]->getEquipes()[0];
					$pays2 = $euro2016->getTabGroups()[$i]->getTabRencontres()[$j]->getEquipes()[1];
					$nomGroupe = $euro2016->getTabGroups()[$i]->getTabRencontres()[$j]->getNomGroupe();

					echo $pays1.' - '.$pays2;
					
					echo '<form method="post" action="savePronostic.php?grp='.$nomGroupe.'&p1='.$pays1.'&p2='.$pays2.'">';
					echo '<input type="number" name="prScoreEq1"/>';
					echo '<input type="number" name="prScoreEq2"/>';
					echo '<input type="submit" value="Pronostic"/>';
					echo '</form>';
					
					echo '<form method="post" action="saveScore.php?grp='.$nomGroupe.'&p1='.$pays1.'&p2='.$pays2.'">';
					echo '<input type="number" name="scoreEq1"/>';
					echo '<input type="number" name="scoreEq2"/>';
					echo '<input type="submit" value="Score"/><br/>';
					echo '</form>';
				}


			}
		}
		echo '<br/><a href="Euro2016.php">Retour à la liste</a>';
	}