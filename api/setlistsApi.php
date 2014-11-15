<?php
	class SetlistsApi extends baseApi {
		private $db;

		public function __construct ($db) {
			$this->db = $db;
		}

		private function setlists(){
			return $this->db->program();
		}

		public function getAll (){
			$setlists = $this->setlists();

			return $this::asJSON($setlists);
		}
	}
?>