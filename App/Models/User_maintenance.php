<?php


namespace App\Models;

class User_maintenance {
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }
    
    public function assignTech($id_user,$id_maintenance){
        $query="insert into user_maintenance (id_user,id_maintenance) values (:id_user,:id_maintenance)";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id_user"=>$id_user,
            ":id_maintenance"=>$id_maintenance
        ]);
    }
}