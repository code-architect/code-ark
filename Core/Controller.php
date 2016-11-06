<?php

namespace Core;

/**
 * Created by Code-Architect.
 * Base Controller
 *
 * PHP Version 5.6
 */
abstract class Controller
{


    /**
     * Parameters from the matched route
     * @var array
     */
    protected $route_param = [];


    /**
     * Class Constructor
     *
     * @param $route_param Parameters from the route variable
     *
     */
    public function __construct($route_param)
    {
        $this->route_param = $route_param;
    }




}