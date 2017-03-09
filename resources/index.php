<?php  
	require_once("config/autoload.php");
	Config\Autoload::run();

	Use config\config as Config;
	/**
	* Global Loader for the app
	*/
	class Loader extends Config
	{

		/*
		* Get list of routes, get controller and action to run
		*/
		public function __construct()
		{
			parent::__construct();
			$routeInfo = $this->getUrlData();
			$routeList = $this->getRoutes();
			$routeName = $routeInfo["routeName"];
			$controller = "\\controllers\\" . $routeList[$routeName]["controller"];
			$action = $routeList[$routeName]["action"] . "Action";
			$routeController = new $controller($action);
			if ($this->getFatalError()) {
				$this->renderError();
			}
			$routeController->render();

		} // __construct()

		/*
		* Render fatal error!
		*/
		private function renderError()
		{
			include("\\views\\fatalError.php");
			exit;
		} // renderError()

	}

	$loader = new Loader();
	
?>
