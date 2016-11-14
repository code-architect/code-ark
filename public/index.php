<?php
/**
 * Front Controller
 *
 * echo 'Requested URL = "'. $_SERVER['QUERY_STRING'].'"'
 *
 */


/**
 * Twig 1.0
 */
require_once dirname(__DIR__). '/vendor/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

/**
 * Autoloader
 */
spl_autoload_register( function ($class)
{
    $root = dirname(__DIR__); //get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class). '.php';
    // if the class is readable
    if(is_readable($file))
    {
        require $root . '/' . str_replace('\\', '/', $class). '.php';
    }
});


/**
 * Error and Exception Handling
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

// Match the requested route
//$url = $_SERVER['QUERY_STRING'];
//
//if($router->match($url)) {
//    echo "<pre>";
//    var_dump($router->getParams());
//    echo "</pre>";
//} else {
//    echo "No routes found for url ".$url;
//}
//
//echo "<pre>";
//echo htmlspecialchars(print_r($router->getRoutes(), true));
//echo "</pre>";


$router->dispatch($_SERVER['QUERY_STRING']);

