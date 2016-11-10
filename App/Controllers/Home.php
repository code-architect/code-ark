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
        $arr = ['12', '13', '14'];
        $arr2 = ['ok', 'see', 'you'];
        $arr3 = ['name'=>'skull', 'home'=>'earth'];

        /*View::render('Home/index.php',['name' => 'Raj',
            'city' => [$arr, $arr2, $arr3]]); */
        View::renderTemplate('Home/index.html', ['name' => 'Architect','numbers'=>$arr, $arr2, 'details'=>$arr3]);
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
