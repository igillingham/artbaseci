<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rb 
{	
	function __construct() 
	{
		// Include database configuration
		include(APPPATH.'/config/database.php');
		        // check if the original redbean file exists
      if (!file_exists($redbean_path = dirname(__FILE__) . '/../third_party/rb/rb.php')) 
      {
            show_error('The RedBean class file was not found.');
      }

        // get original redbean file
        include ($redbean_path);
        
        // does the redbean class exist?
        if (!class_exists('R'))
        {
            show_error('The RedBean class was not found.');
        }
 		
		// Database data
		$host = $db[$active_group]['hostname'];
		$user = $db[$active_group]['username'];
		$pass = $db[$active_group]['password'];
		$db = $db[$active_group]['database'];
		
		// Setup DB connection
		R::setup("mysql:host=$host;dbname=$db", $user, $pass);
		
		// Freezes RedBean while in production mode.
		//R::freeze( ENVIRONMENT == “production” ? TRUE : FALSE );
		R::freeze(TRUE);

	} //end __construct()
	
	   /**
     * Magic call method that passes every call to the R object
     * @return mixed
     */
    public function __call($name, $arguments) 
    {
        return call_user_func_array(array('R', $name), $arguments);
    }
    
	/**
     * Magic get method that passes every property request to the R object
     * @return mixed
     */
    public function __get($name) 
    {
        return R::$name;
    }

} //end Rb
