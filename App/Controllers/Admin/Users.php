<?php

namespace App\Controllers\Admin;

/**
 * User Admin controller
 *
 * PHP Version 5.6
 */

class Users extends \Core\Controller
{

    /**
     * Show Index page
     *
     * @return void
     */
    public function indexAction()
    {
        echo "Hello from Index action of Admin\Users controller";
        echo "<p>Query String Parameters<pre>".htmlspecialchars(print_r($this->route_param, true)) ."</pre></p>";
        echo "<p>Query String Parameters GET<pre>".htmlspecialchars(print_r($_GET, true)) ."</pre></p>";

    }


    /**
     * after filter
     */
    protected function before()
    {
        //echo "(before)";
    }

    /**
     * Before filter
     */
    protected function after()
    {
        //echo "(after)";
    }




}
