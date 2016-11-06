<?php

namespace App\Controllers;
use Core\Controller;

/**
 * Posts controller
 *
 * PHP Version 5.6
 */

class Posts extends Controller
{

    /**
     * Show Index page
     *
     * @return void
     */
    public function index()
    {
        echo "Hello from index action of Posts controller";
        echo "<p>Query String Parameters<pre>".htmlspecialchars(print_r($_GET, true)) ."</pre></p>";

    }


    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNew()
    {
        echo "Hello from addNew action of Posts controller";
    }

    public function edit()
    {
        echo "Hello from edit action of Posts controller";
        echo "<p>Query String Parameters<pre>".htmlspecialchars(print_r($this->route_param, true)) ."</pre></p>";
    }

 
}

