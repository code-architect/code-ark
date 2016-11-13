<?php

namespace App\Models;

use Core\Model;
use PDO;

/**
 * Posts Model
 *
 * PHP Version 5.6
 */
class Post extends Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        try{
            $db = static::getDB();

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
