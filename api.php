<?php

	require('./controller/AdController.php');
	//require('./controller/CategoryController.php');
	//require('./controller/UserController.php');

	class API {

		const DB_SERVER = "localhost";
		const DB_USER = "evarbdec_root";
		const DB_PASSWORD = "root123";
		const DB = "evarbdec_websalesdb";
		private $db = NULL;

		public function __construct()
		{
			$this->dbConnect();
		}

		/*
		 *  Database connection
		 */
		private function dbConnect()
		{
			$this->db = mysql_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
			if ($this->db) {
				mysql_select_db(self::DB,$this->db);
			}
		}

		/*
		 * Public method for access api.
		 * This method dynmically call the method based on the query string
		 */
		public function processRequest()
		{
			$request_method = strtolower($_SERVER['REQUEST_METHOD']);
			switch ($request_method)
			{
				case 'get':
					$data = $_GET['url'];
					break;
				case 'post':
					$data = $_GET['url'];
					break;
				default:
					break;
			}

			$request_parts = explode('/', $data);
			$controller = $request_parts[0];
			switch ($controller)
			{
				case 'ad':
					processAdRequest(substr($data, strlen('ad')+1));
					break;
				case 'category':
					processCategoryRequest(substr($data, strlen('category')+1));
					break;
				case 'user':
					processUserRequest(substr($data, strlen('user')+1));
					break;
				default:
					echo "Invalid Request!";
					break;
			}

		}

	}

	// Initiate our REST library
	$api = new API;
	$api->processRequest();

?>
