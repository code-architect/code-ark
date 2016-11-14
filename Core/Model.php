<?php

namespace Core;

use App\Config;
use PDO;

/**
 * Base Model
 *
 * PHP Version 5.6
 */
abstract class Model
{

    /**
     * Get the PDO Database Connection
     *
     * @return Mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if($db === null)
        {
            $dsn = "mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME.";charset=utf8";

            $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

            // Throw an exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }
    }



//--------------------------------------------------------------------------------------------------------------------//
}