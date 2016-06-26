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

		public function getNomGroupe() {
			return $this->_nomGroupe;
		}

		public function setEquipes(array $equipes) {
			$this->_equipes = $equipes;
		}

		public function setNomGroupe($groupe) {
			$this->_nomGroupe = $groupe;
		}

		// Constructeur
		// ************

		public function __construct($nomGroupe, array $equipes) {
			$this->_nomGroupe = $nomGroupe;
			$this->_equipes = $equipes;
		}
	}