<?php
/**
 * Front Controller
 *
 * echo 'Requested URL = "'. $_SERVER['QUERY_STRING'].'"'
 *
 */

/**
 * Routing
 */

require '../Core/Router.php';

$router = new Router();

// Add the routes

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}');

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
