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
			$this->_tabTeams = $equipes;
			$this->creationListeMatchs();
		}

		// méthodes
		// ********

		// Renvoi le groupe ainsi que les pays le constituant
		public function afficheGroupe() {
			$groupe = '<a href=Euro2016.php?grp='.$this->_nomGroupe.'>Groupe '.$this->_nomGroupe.' : </a><br/>';
			foreach($this->_tabTeams as $pays) {
				$groupe .= $pays.'<br/>';
			}
			return $groupe;
		}

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