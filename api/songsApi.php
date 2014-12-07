<?php
	class SongsApi extends baseApi {
		private $db;

		public function __construct ($db) {
			$this->db = $db;
		}

		private function songs(){
			return $this->db->sang()
				->select('SangId as id, Titel as title, Kilde as source, Slides as slidesOrder, 
					Identifikation as author, ProTekst as proText, CommentsOver as commentsOver, 
					CommentsUnder as commnentsUnder, Udgave as version, Lydfil as soundUrl');
		}
		private function songs2(){
			return $this->db->sang();
		}

		public function getAll ($currentPage = 0, $pageSize = 20){
			$currentPage = intval($currentPage) ?: 0;
			$pageSize = intval($pageSize) ?: 20;
			$offset = $currentPage * $pageSize;

			$songs = $this->songs2();
	
			//var_dump($t);
			//$songs = iterator_to_array($songs);
			//$songs = array_map('iterator_to_array', );
//			return '['. $this::asJSON($songs) .']';
			return $this::asJSON($songs);
		}

		public function info() {
			return $this->songs();
		}
	}
?>