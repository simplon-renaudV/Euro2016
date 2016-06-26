<?php
	
	namespace Classes;

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
			$fichJson = file_get_contents($url);
			$this->_json = json_decode($fichJson);
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
	}