<?php

namespace Core;

/**
 * View Core
 */
class View
{

    /**
     * Render a view file
     *
     * @param $view string The view file
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/".$view;  //relative to core directory

        if(is_readable($file))
        {
            require $file;
        } else {
            echo $file." not found";
        }
    }




}