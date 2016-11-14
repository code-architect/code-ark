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

//---------------------------------------------------------------------------------//

    public function __call($name, $args)
    {
        $method = $name.'Action';

        //check if method exists
        if(method_exists($this, $method))
        {
            if($this->before() !== false)
            {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in controller ".get_class($this));
        }
    }


//---------------------------------------------------------------------------------//

    /**
     * Before filter - called before an action method
     *
     * @return void
     */
    protected function before()
    {
    }

//---------------------------------------------------------------------------------//

    /**
     * After filter - called after an action method
     *
     * @return void
     */
    protected function after()
    {
    }
//---------------------------------------------------------------------------------//


}