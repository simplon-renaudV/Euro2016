<?php
	// Récupère le nom du groupe ainsi que les pays et appelle ensuite la fonction pour afficher la rencontre
	function rencontres ($competition)
	{
		for ($i = 0; $i < count($competition->getTabGroups()); $i++) {
			if ($competition->getTabGroups()[$i]->getNomGroupe() == $_GET['grp']) {

				for ($j = 0; $j < count($competition->getTabGroups()[$i]->getTabRencontres()); $j++) {

					$rencontre = $competition->getTabGroups()[$i]->getTabRencontres()[$j];
					afficheRencontres($rencontre);
				}
			}
		}
	}

	// Affiche un formulaire pour les scores ou les pronostics, en fonction du type
	function formulaire($type, $group, $pays1, $pays2){
		echo '<form method="post" action="save.php?t='.$type.'&grp='.$group.'&p1='.$pays1.'&p2='.$pays2.'">';
		echo '<input type="number" name="equipe1"/>';
		echo '<input type="number" name="equipe2"/>';
		echo '<input type="submit" value="'.$type.'"/>';
		echo '</form>';
	}

	// Affiche les rencontres du groupe avec les formulaires de pronostic et de score
	function afficheRencontres($rencontre) {
		$pays1 = $rencontre->getEquipes()[0];
		$pays2 = $rencontre->getEquipes()[1];
		$group = $rencontre->getNomGroupe();

		echo $pays1->getPays().'<img src="'.$pays1->getFlag().'"/> - <img src="'.$pays2->getFlag().'"/>'.$pays2->getPays();

		formulaire('Pronostics', $group, $pays1->getPays(), $pays2->getPays());
		formulaire('Scores', $group, $pays1->getPays(), $pays2->getPays());
	}

	// Affiche la liste des pays du groupe
	function afficheGroupe($grp) {

		$groupe = $grp->getNomGroupe();
		$equipes = $grp->getTabTeams();

		echo '<a href=Euro2016.php?grp='.$groupe.'><h1>Groupe '.$groupe.' : </h1></a><br/>';
			foreach($equipes as $pays) {
				echo '<div>'.$pays->getPays().'<img src="'.$pays->getFlag().'"/></div><br/>';
			}
	}
