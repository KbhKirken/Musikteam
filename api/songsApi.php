<?php
	class SongsApi extends baseApi {
		private $db;

		public function __construct ($db) {
			$this->db = $db;
		}

		private function songs(){
			return $this->db->sang();
		}

		public function getAll (){
			$songs = $this->songs();

			return $this::asJSON($songs);
		}
	}
?>