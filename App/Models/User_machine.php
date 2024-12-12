<?php

namespace App\Models;

class User_machine
{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function assignTech($id_user,$id_machine){
        $query="insert into user_machine (id_user,id_machine) values (:id_user,:id_machine)";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id_user"=>$id_user,
            ":id_machine"=>$id_machine
        ]);
    }


    public function list()
     {
         // SQL query to fetch users with basic information.
         $query = "select * from user_machine;";
         $relations = [];
         
         // Execute the query and iterate through the results.
         foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $relation) {
             // Save users in an associative array where the key is the user's ID.
             $relations[$relation["id"]] = $relation;
         }
         
         // Return the list of users.
         return $relations;
     }
}