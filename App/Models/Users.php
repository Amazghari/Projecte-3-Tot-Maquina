<?php

/**
 *  Model for the user tables
 * 
 * 
 */

namespace App\Models;


class Users
{
    private $sql;


    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function getUser($username){
        $query= "select * from users where username='{$username}'";
        $stm = $this->sql->prepare($query);
        $stm->execute();
        
        // Fetch the result as an associative array.
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }


}