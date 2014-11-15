<?php
	include '../NotORM.php';
	require './baseApi.php';
	include './usersApi.php';
	include './songsApi.php';
	include './setlistsApi.php';

	class ApiFactory {
		private static $instance; 
		private $db;

		private function __construct () {
			$pdo = new PDO("mysql:host=localhost:3306;dbname=musikteam","root","");
			$this->db = new NotORM($pdo);
		}

		// getInstance method 
		private static function getInstance() { 
			if(!self::$instance) { 
				self::$instance = new self(); 
			} 

			return self::$instance; 
		}

		private function creatingApi ($className) {
			return new $className($this->db);

		}

		private static function createApi ($className) {
			return self::getInstance()->creatingApi($className);
		}

		private static $usersApi;
		public static function UsersApi () {
			if(!self::$usersApi) {
				self::$usersApi = self::createApi("UsersApi");
			}

			return self::$usersApi;
		}

		private static $songsApi;
		public static function SongsApi () {
			if(!self::$songsApi) {
				self::$songsApi = self::createApi("SongsApi");
			}

			return self::$songsApi;
		}

		private static $setlistsApi;
		public static function SetlistsApi () {
			if(!self::$setlistsApi) {
				self::$setlistsApi = self::createApi("SetlistsApi");
			}

			return self::$setlistsApi;
		}
	}
?>