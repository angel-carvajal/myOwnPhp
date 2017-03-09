<?php namespace config;

	/**
	* Global configuration for the app
	*/
	class config
	{

		/**
		* Routes of the app
		* @var array
		*/
		private $routes = array(
			"home" => array("controller" => "Home", "action" => "default") // /home
		);

		/**
		* Url Data
		* @var array
		*/
		private $urlData = array();

		/**
		* ERROR!
		* @var boolean
		*/
		private $fatalError = false;
		
		/**
		* Set timezone, set error reporting and treat url params
		*/
		public function __construct()
		{
			date_default_timezone_set('America/Monterrey');
			error_reporting(E_ALL);
			$this->treatUrl();

		} // __construct()

		/**
		* Treat Url params
		*/
		private function treatUrl() 
		{
			$method = $_SERVER['REQUEST_METHOD'];
			switch ($method) {
				case "GET":
					$this->urlData = $this->cleanUrl($_GET);
				break;
				case "POST":
					$this->urlData = $this->cleanUrl($_POST);
				break;
				default:
					$this->fatalError = true;
				break;
			}

		} // treatUrl()

		/**
		* @var array params from url
		* @return Params cleaned
		*/
		private function cleanUrl($data)
		{
			$urlData = array();
			if (is_array($data)){
				foreach ($data as $key => $value) {
					$urlData[$key] = $this->cleanUrl($value);
				}
			}else{
				if(get_magic_quotes_gpc()){
					$data = trim (stripslashes($data));
				}
				$data = strip_tags($data);
				$data = htmlentities($data);
				$urlData = trim($data);
			}
			return $urlData;

		} // cleanUrl()

		/**
		* @return array of routes
		*/
		public function getRoutes() 
		{
			return $this->routes;

		} // getRoutes()

		/**
		* @return array of urlData
		*/
		public function getUrlData() 
		{
			return $this->urlData;

		} // getRoutes()

		/**
		* @return array of urlData
		*/
		public function getFatalError() 
		{
			return $this->fatalError;

		} // getRoutes()

	}
	
?>