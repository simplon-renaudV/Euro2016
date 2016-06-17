<?php
	class Teams {

		private $_pays;
		
		// getters & setters
		// *****************
		public function getPays() {
			return $this->_pays;
		}
	
		public function setPays($pays) {
			$this->_pays = $pays;
		}
		
		// Constructeur
		// ************
		public function __construct($nomPays) {
			$this->_pays = $nomPays;
		}

	}