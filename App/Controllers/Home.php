<?php

namespace App\Controllers;
use Core\Controller;
use Core\View;

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
        View::render('Home/index.php',[
            'name' => 'Raj',
            'city' => ['kolkata'=>'1', 'agra'=>'12', 'delhi'=>'13']
        ]);
    }


    /**
     * after filter
     */
    protected function before()
    {
        //echo "(before)";
        //return false;
    }

    /**
     * Before filter
     */
    protected function after()
    {
        //echo "(after)";
    }




}
