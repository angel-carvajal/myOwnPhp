<?php namespace library;

	/**
	* Class to render templates
	*/
	class Template 
	{

		/**
		* @var array with propertie to be avaiable on the template
		*/
		public function __construct($tempalteList = array(), $properties = array())
		{
			foreach ($properties as $key => $value) 
			{
				$this->setProperties($key, $value);
			}

			foreach ($tempalteList as $template) 
			{
				include($template);
			}
			exit;

		} // __construct()

		/**
		* @var string - property to set
		* @var value to set
		*/
		private function setProperties($property, $value)
		{
			$this->$property=$value;

		} // setProperties()
		
	}

?>
