<?php

namespace App\Models;

class User_incidences{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function assignTech($id_user,$id_incidence){
        $query="insert into user_incidence(id_user,id_incidence) values(:id_user,:id_incidence);";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id_user"=>$id_user,":id_incidence"=>$id_incidence]);
    }
    
}