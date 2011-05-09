<?php 




defined('SYSPATH') or die('No direct script access.');
Class AutoLoader_Assetic {

	public static $include_cache = array();
	
	static public function register()
	{
		ini_set('unserialize_callback_func', 'spl_autoload_call');
		spl_autoload_register(array(new self, 'autoload'));
	}

	/**
	* Handles autoloading of classes.
	*
	* @param  string  $class  A class name.
	*
	* @return boolean Returns true if the class has been loaded
	*/
	static public function autoload($class)
	{

		if($file = Kohana::find_file('classes', str_replace('\\', '/', $class))) {
			include $file;
			return;
		}
		
		if($file = Kohana::find_file('vendor/Assetic/src/Assetic', str_replace('\\', '/', $class))) {
			include $file;
			return;
		}

	

	}

}