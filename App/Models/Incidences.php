<?php

namespace App\Models;

class Incidences{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function add($name,$priority,$description,$state,$id_machine)
    {
        $query="insert into incidence (name,priority,description,state,id_machine,starting_date) values ('{$name}','{$priority}','{$description}','{$state}',$id_machine,CURDATE())";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }

}