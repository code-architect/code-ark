<?php

namespace App\Controllers;
/**
 * Posts controller
 *
 * PHP Version 5.6
 */

class Posts
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


}

