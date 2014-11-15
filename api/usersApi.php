<?php
	class UsersApi extends baseApi {
		private $db;

		public function __construct ($db) {
			$this->db = $db;
		}

		private function users(){
			return $this->db->bruger()
				->select("BrugerId,Brugernavn,Fornavn,Efternavn,Adresse1,Adresse2,Telefon,Mobil,Leder,Admin,Email,ImageUrl");
		}

		public function getAll (){
			$users = $this->users();

			return $this::asJSON($users);
		}
	}
?>