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
    public function indexAction()
    {
        echo "Hello from index action of Posts controller";
        echo "<p>Query String Parameters<pre>".htmlspecialchars(print_r($_GET, true)) ."</pre></p>";

    }


    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
        echo "Hello from addNew action of Posts controller";
    }

    public function editAction()
    {
        echo "Hello from edit action of Posts controller";
        echo "<p>Query String Parameters<pre>".htmlspecialchars(print_r($this->route_param, true)) ."</pre></p>";
    }


}

