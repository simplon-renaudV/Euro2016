<?php
	
	namespace Classes;

	include_once('loadData.php');
	include_once('PDO.php');

	class Competition {
		
		private $_nomCompetition;
		private $_json;
		private $_tabGroups = [];
		private $_bdd;

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

		public function getBdd() {
			return $this->_bdd;
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

		public function setBdd($bdd) {
			$this->_bdd = $bdd;
		}	

		// Constructeur
		// ************
		
		public function __construct($bdd, $url) {
			$this->_json = loadData($url);
			$this->_nomCompetition = $this->_json->name;
			$this->_bdd = $bdd;
			$this->createGroupes();
			$this->createBDD($this->_json);
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

		// inscrit la compétition depuis le json en base de donnees (competition, groupes et equipes)
		public function createBDD($data) {
			$donnees = $this->_bdd->prepare("INSERT INTO Competition (nomCompetition) VALUES (:nomCompetition)");
			$donnees->bindParam(':nomCompetition', $data->name);
			$donnees->execute();

			// récupère l'id de la compétition
			$donnees = $this->_bdd->prepare("SELECT idCompetition FROM Competition WHERE nomCompetition = :nomCompetition");
			$donnees->bindParam(':nomCompetition', $data->name);
			$donnees->execute();
			$idC = $donnees->fetch()[0];

			for ($i=0; $i<count($data->groups); $i++) {
				$donnees = $this->_bdd->prepare("INSERT INTO Groupe (nomGroupe, idCompetition) VALUES (:nomGroupe, :idCompetition)");
				$donnees->bindParam(':nomGroupe', $data->groups[$i]->id);
				$donnees->bindParam(':idCompetition', $idC);
				$donnees->execute();

				// récupère l'id du groupe
				$donnees = $this->_bdd->prepare("SELECT idGroupe FROM Groupe WHERE nomGroupe = :nomGroupe AND idCompetition = :idCompetition");
				$donnees->bindParam(':idCompetition', $idC);
				$donnees->bindParam(':nomGroupe', $data->groups[$i]->id);
				$donnees->execute();
				$idG = $donnees->fetch()[0];

				for ($j=0; $j<count($data->groups[$i]->teams); $j++) {
					$donnees = $this->_bdd->prepare("INSERT INTO Equipe (nomEquipe, urlFlag, idGroupe) VALUES (:nomEquipe, :urlFlag, :idGroupe)");
					$donnees->bindParam(':nomEquipe', $data->groups[$i]->teams[$j]->nom);
					$donnees->bindParam(':urlFlag', $data->groups[$i]->teams[$j]->flag);
					$donnees->bindParam(':idGroupe', $idG);
					$donnees->execute();
				} 
			}
		}
	}