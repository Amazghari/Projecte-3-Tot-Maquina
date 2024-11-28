<?php

namespace App\Models;

class Machines
{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function add($name,$model,$manufacturer,$serial_num,$installation_date,$location,$image_url)
    {
        $query="insert into machines (name,model,manufacturer,serial_num,installation_date,location,image_url) values ('{$name}','{$model}','{$manufacturer}','{$serial_num}','{$installation_date}','{$location}','{$image_url}')";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }

    public function list()
    {
        $query = "select * from machines;";
        $machines = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $machine) {
            $machines[$machine["id"]] = $machine;
        }
        return $machines;
    }   
}