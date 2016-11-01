<?php
/**
 * Front Controller
 *
 * echo 'Requested URL = "'. $_SERVER['QUERY_STRING'].'"'
 *
 */

require '../App/Controllers/Posts.php';


/**
 * Routing
 */
require '../Core/Router.php';

$router = new Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');


// Match the requested route
$url = $_SERVER['QUERY_STRING'];

if($router->match($url)) {
    echo "<pre>";
    var_dump($router->getParams());
    echo "</pre>";
} else {
    echo "No routes found for url ".$url;
}

echo "<pre>";
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo "</pre>";

$router->dispatch($_SERVER['QUERY_STRING']);
