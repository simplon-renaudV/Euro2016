<?php
	
	namespace Classes;

	include_once('loadData.php');
	include_once('PDO.php');

	class Competition {
		
		private $_nomCompetition;
		private $_json;
		private $_tabGroups = [];

		// Getters & Setters
		// *****************
		
		public function getJson() {
			return $this->_json;
		}

		public function getNomCompetition() {
			return $this->_nomCompetition;
		}

		public function getTabGroups() {
			return $this->_tabGroups;
		}

		public function setJson($json) {
			$this->_json = $json;
		}

		public function setNomCompetition($competition) {
			$this->_nomCompetition = $competition;
		}

		public function setTabGroups(array $groupes) {
			$this->_tabGroups = $groupes;
		}

		// Constructeur
		// ************
		
		public function __construct($url) {
			$this->_json = loadData($url);
			$this->_nomCompetition = $this->_json->name;
			$this->createGroupes();
		}

		// Méthodes
		// ********

		//Crée les groupes (instancie des objets Groupes dans le tableau _tabGroups)
		public function createGroupes() {
			for ($i=0; $i < count($this->_json->groups); $i++) {
				$grp = new Groups($this->_json->groups[$i]->id, $this->_json->groups[$i]->teams);
				array_push($this->_tabGroups, $grp);
			}
		}

		public function createBDD ($db, $data) {
			for ($i=0; $i < count($data->groups); $i++) {
				for ($j=0; $j < count($data->groups[$i]->teams); $j++) {

					$donnees=$db->prepare("INSERT INTO Equipes (nomGroupe, nomEquipe, urlFlag) VALUES (:nomGroupe, :nomEquipe, :urlFlag)");
				$donnees->execute(array(
					'nomGroupe'=>$data->groups[$i]->id,
					'nomEquipe'=>$data->groups[$i]->teams[$j]->nom,
					'urlFlag'=>$data->groups[$i]->teams[$j]->flag
					));
				}	
			}
		}
	}