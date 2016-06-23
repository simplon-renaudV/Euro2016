<?php
	namespace Classes;
	
	class Rencontres {
		private $_nomGroupe;
		private $_equipes = [];
		private $_score = [];
		private $_pronostic = [];

		// getters & setters
		// *****************
		
		public function getEquipes() {
			return $this->_equipes;
		} 

		public function getScores() {
			return $this->_score;
		}

		public function getPronostic() {
			return $this->_pronostic;
		}

		public function getNomGroupe() {
			return $this->_nomGroupe;
		}

		public function setEquipes($equipes) {
			$this->_equipes = $equipes;
		}

		public function setScore($score) {
			$this->_score = $score;
		}

		public function setPronostic($pronostic) {
			$this->_pronostic = $pronostic;
		}

		public function setNomGroupe($groupe) {
			$this->_nomGroupe = $groupe;
		}

		// Constructeur
		// ************

		public function __construct($nomGroupe, $equipes) {
			$this->_nomGroupe = $nomGroupe;
			$this->_equipes[0] = [$equipes[0]->getPays(),$equipes[0]->getFlag()];
			$this->_equipes[1] = [$equipes[1]->getPays(),$equipes[1]->getFlag()];
		}
	}