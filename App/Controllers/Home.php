<?php

namespace App\Controllers;
use Core\Controller;

/**
 * Home controller
 *
 * PHP Version 5.6
 */

class Home extends Controller
{

    /**
     * Show Index page
     *
     * @return void
     */
    public function indexAction()
    {
        echo "Hello from index action of Home controller";
    }


    /**
     * after filter
     */
    protected function before()
    {
        echo "(before)";
        return false;
    }

    /**
     * Before filter
     */
    protected function after()
    {
        echo "(after)";
    }




}
