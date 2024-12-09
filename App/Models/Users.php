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
        $query= "select * from users where username=:username";
        $stm = $this->sql->prepare($query);
        $stm->execute([":username"=>$username]);
        
        // Fetch the result as an associative array.
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function add($name,$surname,$email,$role,$username,$img,$password){
        $query= "insert into users (name,surname,email,role,username,img,password) values (:name,:surname,:email,:role,:username,:img,:password)";
        $stm = $this->sql->prepare($query);
        $stm->execute([":name"=>$name,":surname"=>$surname,":email"=>$email,":role"=>$role,":username"=>$username,":img"=>$img,":password"=>$password]);
    }
     // Method to delete a user from the database by their ID.
     public function delete($id)
     {
         // SQL query to delete a user based on their ID.
         $query = "delete from users where id=:id;";
         
         // Prepare and execute the query.
         $stm = $this->sql->prepare($query);
         $stm->execute([":id"=>$id]);
     }
     //list all the users for the admin dashboard
     public function list()
     {
         // SQL query to fetch users with basic information.
         $query = "select * from users;";
         $users = [];
         
         // Execute the query and iterate through the results.
         foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $user) {
             // Save users in an associative array where the key is the user's ID.
             $users[$user["id"]] = $user;
         }
         
         // Return the list of users.
         return $users;
     }

    //  public function listProfile(){
    //     $query = "select * from users;";
    //     $profiles = [];
    //     foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $profile) {
    //         $profiles[$profile["id"]] = $profile;
    //     }
    //     return $profiles;
    // }

     public function updateProfile($id,$name,$surname,$username,$img){
        $query="update users set name=:name,surname=:surname,username=:username,img=:img where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":name"=>$name,
            ":surname"=>$surname,
            ":username"=>$username,
            ":img"=>$img,
            ":id"=>$id
        ]);
     }
}