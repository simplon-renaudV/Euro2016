<?php

	namespace Classes;
	
	class Teams {

		private $_pays;
		private $_flag;
		
		// getters & setters
		// *****************
		
		public function getPays() {
			return $this->_pays;
		}
	
		public function setPays($pays) {
			$this->_pays = $pays;
		}

		public function getFlag() {
			return $this->_flag;
		}

		public function setFlag($flag) {
			$this->_flag = $flag;
		}
		
		// Constructeur
		// ************
		
		public function __construct($nomPays, $imgFlag) {
			$this->_pays = $nomPays;
			$this->_flag = $imgFlag;
		}

	}