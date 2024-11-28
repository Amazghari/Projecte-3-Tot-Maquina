<?php

namespace App\Models;

class Maintenance {
    private $sql;


    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function add($state,$type,$description,$date,$idmachine){
        $query="insert into maintenance (state,type,description,maintenance_date,id_machine) values ('{$state}','{$type}','{$description}','{$date}','{$idmachine}')";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }
    public function list (){
        
    }
}
