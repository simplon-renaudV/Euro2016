<?php
	function loadData ($dataFile) {
		$file = new SplFileInfo($dataFile);
		$extension = $file->getExtension();

		if ($extension == 'xml') {
			$xml=simplexml_load_file("$dataFile");

			$objet = new StdClass();
	
			$objet->name = (string) $xml->name[0];
			$objet->groups = [];
			
			for ($i=0; $i<6; $i++) {
				$nomGroupe = (string) $xml->groups[$i]->id; 
				$paysGroupe = [];

				$objGroupe = new StdClass();
				$objGroupe->id=$nomGroupe;
				$objGroupe->teams=[];

				array_push($objet->groups, $objGroupe);

				for ($j=0; $j<4; $j++) {
					$nomPays = (string) $xml->groups[$i]->teams[$j]->nom[0];
					$flagPays = (string) $xml->groups[$i]->teams[$j]->flag[0];
					
					$objPays = new StdClass();

					$objPays->nom = $nomPays;
					$objPays->flag = $flagPays;

					array_push($objet->groups[$i]->teams, $objPays);

				}
			}
			return $objet;
		}

		if ($extension == 'json') {
			$fichJson = file_get_contents($dataFile);
			return json_decode($fichJson);
		}
	}