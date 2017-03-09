<?php namespace Config;

	/**
	 * Autoload documents needed
	 */
	 class Autoload
	 {
	 	
	 	/**
	 	* Autoload files needed
	 	*/
	 	public static function run(){
			spl_autoload_register(function($class){
				$route = str_replace("\\", "/", $class) . ".php";
				include_once $route;
			});

		} // run()

	 } 
	 
?>