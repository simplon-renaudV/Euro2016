<?php
	// récupère les données depuis un fichier json (ou xml)
	function loadData ($dataFile) {
		$file = new SplFileInfo($dataFile);
		$extension = $file->getExtension();

		if ($extension == 'xml') {
			$xml=simplexml_load_file("$dataFile");

			$xml = json_encode($xml);
			$xml = json_decode($xml);

			return $xml;
		}

		if ($extension == 'json') {
			$fichJson = file_get_contents($dataFile);
			return json_decode($fichJson);
		}
	}

	// permet de récupérer les données de la compétition depuis la base de données
	// TODO

	function loadDataFromDb($db) {
	
	}			
