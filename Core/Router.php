<?php

namespace Core;
/**
 * Created by Code-Architect.
 *
 * Router Class
 *
 */

class Router
{

    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    //----------------------------------------------------------------------------------------------------------------//


    /**
     * Add a route to the routing table
     *
     * @param String $route The route URL
     * @param array $params Parameters (controller, action etc)
     * @return void
     */
    public function add($route, $params = [])
    {
        // Convert the route into a regular expression, escape the forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert the variables, i.e {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)' ,$route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    //----------------------------------------------------------------------------------------------------------------//


    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }


    //----------------------------------------------------------------------------------------------------------------//


    /**
     * Match the route to the routes in the matching tabel, setting the $params property if a route is found.
     *
     * @param string $url The route url
     * @return bool true if matched, false otherwise.
     */
    public function match($url)
    {
        // Match to the fixed URL format /controller/action
        //$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

        foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches))
            {
                // Get named capture group values
                //$params = [];

                foreach ($matches as $key => $match) {
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }


    //----------------------------------------------------------------------------------------------------------------//


    /**
     * Get the currently matched parameters
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    //----------------------------------------------------------------------------------------------------------------//

    /**
     * Dispatch the route create the controller object and run the action method
     *
     * @param $url
     *
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        // matching the url, like in the front controller
        if($this->match($url))
        {
            // if we get a match with the routing table, we get the controller parameter
            $controller = $this->params['controller'];
            // and convert it to the StudlyCaps
            $controller = $this->convertToStudlyCaps($controller);
            //$controller = "App\Controllers\\$controller";
            $controller = $this->getNamespace().$controller;

            //checking if the class exists, then create the new object of that class
            if(class_exists($controller))
            {
                $controller_object = new $controller($this->params);

                // if we get a match with the routing table, we get the action parameter
                $action = $this->params['action'];
                // and convert it to the camelCase
                $action = $this->convertToCamelCase($action);

                // if action exists then call it
                if(is_callable([$controller_object, $action]))
                {
                    $controller_object->$action();
                } else {
                    echo "Method $action (in controller $controller) not found";
                }
            }else {
                echo "Controller class $controller not found";
            }
        }else {
            echo "No route Matched";
        }
    }


    //----------------------------------------------------------------------------------------------------------------//


    /**
     * Convert the strings with hyphens to StudlyCaps
     * e.g. post-author => PostAuthors
     *
     * @param $controller $string the string convert
     *
     * @return string
     */
    public function convertToStudlyCaps($controller)
    {
        return str_replace(' ', '', ucwords(str_replace('-',' ', $controller)));
    }


    //----------------------------------------------------------------------------------------------------------------//


    /**
     * Convert the strings with hyphens to camelCase
     * e.g. add-new => addNew
     *
     * @param $action
     *
     * @return string
     */
    public function convertToCamelCase($action)
    {
        return lcfirst($this->convertToStudlyCaps($action));
    }


    //----------------------------------------------------------------------------------------------------------------//

    /**
     * OUTPUT
     * __________________________________________________________________________________
     * localhost/?page=1                    page=1                          ''
     * localhost/posts?page=1               posts&page=1                    posts
     * localhost/posts/index                posts/index                     posts/index
     * localhost/posts/index&page=1         posts/index&page=1              posts/index
     * __________________________________________________________________________________
     *
     * A URL of the format localhost/?page (one variable name, no value) won't work, however
     * The .htaccess file converts the first ? to a & when it's passed through to the $_SERVER variable.
     *
     * @param string $url the full url
     *
     * @return string
     */
    protected function removeQueryStringVariables($url)
    {
        if($url != '')
        {
            $parts = explode('&' , $url, 2);

            if(strpos($parts[0], '=') === false){
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }


    //----------------------------------------------------------------------------------------------------------------//

    /**
     * Get the namespace for the controller class. The namespace defined in the route parameters is added if present.
     *
     * @return string
     */
    protected function getNamespace()
    {
        // Default namespace
        $namespace = 'App\Controllers\\';

        // if the parameter name has been passed in,
        // we add it to the already defined namespace
        if(array_key_exists('namespace', $this->params))
        {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }


//----------------------------------------------------------------------------------------------------------------//
}