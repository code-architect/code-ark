<?php

namespace App\Models;

use PDO;

/**
 * Posts Model
 *
 * PHP Version 5.6
 */
class Post
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $host       = 'localhost';
        $dbname     = 'code_ark';
        $username   = 'root';
        $password   = '';

        try{
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            $stmt = $db->query("SELECT id, title, content FROM `posts` ORDER BY created_at");
            if($stmt !== false)
            {
                return $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch (\PDOException $e)
        {
            echo $e->getMessage();
        }

    }

//---------------------------------------------------------------------------------------------------------------------//
}
