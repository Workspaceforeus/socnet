<?php

/*if(!empty($_SESSION['login']))	
	header('Location: /template/profile.php');

$rout = $_GET['rout'];
$action = $_GET['action'];

	if(isset($rout))
{
$object = new $rout;
$object->{$action}();
}

else include '/template/1.html';
*/
define('BASE_PATH', dirname(__FILE__));

class App
{
	public static $config = null;

    public static function getConfig($key)
    {
        if(self::$config === null)
        {
            self::$config = include_once('app/config/main.php');
        }

        return isset(self::$config[$key]) ? self::$config[$key] : false;
    }
}


function my_autoloader($class)
{
	if(file_exists('app/model/'.$class.'.php'))
	{
		include_once 'app/model/'.$class.'.php';
	}
	elseif (file_exists('app/controller/'.$class.'.php'))
	{
		include_once 'app/controller/'.$class.'.php';
	}
}


spl_autoload_register('my_autoloader');
$route=ucfirst($_GET['r']) . 'Controller';
$action = $_GET['a'];
if ((!isset($route))||(!isset($action)))
{
	$route='HomeController';
	$action='index';
}
$controller=new $route;
$controller->{$action}();
?>