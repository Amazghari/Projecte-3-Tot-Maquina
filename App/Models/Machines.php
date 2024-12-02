<?php

namespace App\Models;

class Machines
{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function add($name,$model,$manufacturer,$serial_num,$installation_date,$longitude,$latitude,$image_url)
    {
        $query="insert into machines (name,model,manufacturer,serial_num,installation_date,longitude,latitude,image_url) values ('{$name}','{$model}','{$manufacturer}','{$serial_num}','{$installation_date}','{$longitude}','{$latitude}','{$image_url}')";
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
    public function update($id,$name,$model,$manufacturer,$serial_num,$longitude,$latitude,$image_url){
        $query="update machines set name='{$name}',model='{$model}',manufacturer='{$manufacturer}',serial_num='{$serial_num}',longitude='{$longitude}',latitude='{$latitude}',image_url='{$image_url}' where id='{$id}'";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }

    public function delete($id){
        $query="delete from machines where id={$id};";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }

    public function asssignTech($id,$iduser){
        $query="select * from user_machines where id_machine={$id} and id_user={$iduser}";
        $stm = $this->sql->prepare($query);
        $stm->execute();
        
        // Fetch the result as an associative array.
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

       if(!$result){
        $query2="insert into user_machines (id_user,id_machine) values ('{$iduser}','{$id}');";
       }
       else {
        $query2="update user_machines set id_user='{$iduser}' where id_machine='{$id}'";
       }
       $stm = $this->sql->prepare($query2);
        $stm->execute();
    }

    public function getById($id){
        $query="select * from machines where id='{$id}'";
        $stm = $this->sql->prepare($query);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    public function updateMachine($id,$model,$manufacturer,$longitude, $latitude){
        $query="update machines set model='{$model}',manufacturer='{$manufacturer}',longitude='{$longitude}',latitude='{$latitude}' where id='{$id}'";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }
}
