<?php

namespace Core;

use PDO;

/**
 * Base Model
 *
 * PHP Version 5.6
 */
abstract class Model
{

    /**
     * Get the PDO
     */
    protected static function getDB()
    {
        static $db = null;

        if($db === null)
        {
            $host       = 'localhost' ;
            $dbname     = 'code_ark';
            $username   = 'root';
            $password   = '';

            try
            {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

                return $db;
            }catch (\PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }



//--------------------------------------------------------------------------------------------------------------------//
}