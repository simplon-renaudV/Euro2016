<?php
	namespace Classes;
	
	class groups {

		private $_nomGroupe;
		private $_tabTeams = [];
		private $_tabRencontres = [];

		// getters & setters
		// *****************
		
		public function getTabTeams() {
			return $this->_tabTeams;
		}

		public function getNomGroupe() {
			return $this->_nomGroupe;
		}

		public function getTabRencontres() {
			return $this->_tabRencontres;
		}

		public function setTabTeams($tabTeams) {
			$this->_tabTeams = $tabTeams;
		}

		public function setNomGroupe($nomGroupe) {
			$this->_nomGroupe = $nomGroupe;
		}
	
		public function setTabRencontres($tabRencontres) {
			$this->_tabRencontres = $tabRencontres;
		}
		
		// Constructeur
		// ************
		
		public function __construct ($lettre, $equipes) {
			$this->_nomGroupe = $lettre;
			
			for ($i=0; $i<count($equipes); $i++) {
				$equipe = new Teams($equipes[$i]->nom, $equipes[$i]->flag);
				array_push($this->_tabTeams, $equipe);
			}
			$this->creationListeMatchs();
		}

		// méthodes
		// ********

		// Crée la liste des matchs du groupe dans un tableau
		public function creationListeMatchs() {
			for ($i=0; $i<count($this->_tabTeams); $i++) {
				for (($j=$i+1); $j<count($this->_tabTeams); $j++) {
					$rencontre = new Rencontres($this->_nomGroupe,[$this->_tabTeams[$i],$this->_tabTeams[$j]]);
					array_push($this->_tabRencontres, $rencontre);
				}
			}
		}
	}