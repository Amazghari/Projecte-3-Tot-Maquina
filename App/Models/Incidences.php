<?php

namespace App\Models;

class Incidences{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function add($name,$state,$priority,$description,$id_machine)
    {
        $query="insert into incidence (name,state,priority,description,id_machine,starting_date) values (:name,:state,:priority,:description,:id_machine,CURDATE())";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":name"=>$name,
            ":state"=>$state,
            ":priority"=>$priority,
            ":description"=>$description,
            ":id_machine"=>$id_machine
        ]); 
    }

    public function list(){
        $query = "select * from incidence;";
        $incidences = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $incidence) {
            $incidences[$incidence["id"]] = $incidence;
        }
        return $incidences;
    }

}