<?php

	require_once('autoload.php');
	use Classes\Competition;
	use Classes\Groups;
	use Classes\Rencontres;
	use Classes\Teams;

	$euro2016 = new Competition('Json/competition.json');

	// Récupère le nom du groupe ainsi que les pays et appelle ensuite la fonction pour afficher la rencontre
	function rencontres ($competition)
	{
		for ($i = 0; $i < count($competition->getTabGroups()); $i++) {
			if ($competition->getTabGroups()[$i]->getNomGroupe() == $_GET['grp']) {

				for ($j = 0; $j < count($competition->getTabGroups()[$i]->getTabRencontres()); $j++) {

					$pays1 = $competition->getTabGroups()[$i]->getTabRencontres()[$j]->getEquipes()[0];
					$pays2 = $competition->getTabGroups()[$i]->getTabRencontres()[$j]->getEquipes()[1];
					$nomGroupe = $competition->getTabGroups()[$i]->getTabRencontres()[$j]->getNomGroupe();

					afficheRencontres($nomGroupe, $pays1, $pays2);
				}
			}
		}
	}

	// Affiche un formulaire pour les scores ou les pronostics, en fonction du type
	function formulaire($type, $group, $pays1, $pays2){
		echo '<form method="post" action="save.php?f='.$type.'&grp='.$group.'&p1='.$pays1.'&p2='.$pays2.'">';
		echo '<input type="number" name="equipe1"/>';
		echo '<input type="number" name="equipe2"/>';
		echo '<input type="submit" value="'.$type.'"/>';
		echo '</form>';
	}

	// Affiche les rencontres du groupe avec les formulaires de pronostic et de score
	function afficheRencontres($group, $pays1, $pays2) {
		echo $pays1.' - '.$pays2;
		formulaire('Pronostics', $group, $pays1, $pays2);
		formulaire('Score', $group, $pays1, $pays2);

	}

	// si il n'y a pas d'equipes en paramètres get, affiche la liste des groupes
	if (!isset($_GET['grp'])) {
		for ($i=0; $i<count($euro2016->getTabGroups()); $i++) {
			echo $euro2016->getTabGroups()[$i]->afficheGroupe().'<br/>';
		}
	}

	// sinon on affiche la liste des matchs du groupe
	else {
		rencontres($euro2016);
		echo '<br/><a href="Euro2016.php">Retour à la liste</a>';
	}