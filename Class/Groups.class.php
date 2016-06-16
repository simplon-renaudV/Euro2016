<?php
	class groups {

		private $_nomGroupe;
		private $_tabTeams=[];

		// getters & setters
		// *****************
		public function getTabTeams() {
			return $this->_tabTeams;
		}

		public function getNomGroupe() {
			return $this->_nomGroupe;
		}

		public function setTabTeams($tabTeams) {
			$this->_tabTeams = $tabTeams;
		}

		public function setNomGroupe($nomGroupe) {
			$this->_nomGroupe = $nomGroupe;
		}
	
		// toString
		// ********
		public function __toString() {
			$groupe = 'Equipe dans le groupe '.$this->_nomGroupe.' : <br/>';
			foreach($this->_tabTeams as $pays) {
				$groupe .= $pays.'<br/>';	
			}
			return $groupe;
		}
	
		// méthodes
		// ********
		public function creationListeMatchs() {
			for ($i=0; $i<count($this->_tabTeams); $i++)
		}

	}