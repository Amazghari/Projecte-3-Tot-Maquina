<?php

namespace App\Models;

class Incidences{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }
// add new incidance
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
//select from incidances
    public function list(){
        $query = "select * from incidence;";
        $incidences = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $incidence) {
            $incidences[$incidence["id"]] = $incidence;
        }
        return $incidences;
    }
// get incidences by ID
    public function getById($id){
        $query="select * from incidence where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id"=>$id]);
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
// get all incidences
    public function listEdit(){
        $query = "select * from incidence;";
        $incidences = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $incidence) {
            $incidences[$incidence["id"]] = $incidence;
        }
        return $incidences;
    }

    public function listupdate($id,$name,$state,$priority,$description,$id_machine)
    {
        $query="update incidence set name=:name, state=:state, priority=:priority, description=:description, id_machine=:id_machine where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id"=>$id,
            ":name"=>$name,
            ":state"=>$state,
            ":priority"=>$priority,
            ":description"=>$description,
            ":id_machine"=>$id_machine
        ]);
    }


    public function listByMachine($id){

        $subquery="select users.name,users.id, id_incidence from user_incidence join users on users.id=user_incidence.id_user where id_incidence=:id;";
        //dd($subquery);
        $query = "select * from incidence where id_machine=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id"=>$id
        ]);
        $incidences = [];
        $users = [];
        foreach ($stm->fetchAll(\PDO::FETCH_ASSOC) as $incidence) {
            $stm=$this->sql->prepare($subquery);
            $result=$stm->execute([
                ":id"=>$incidence["id"]
            ]);
            foreach ($stm->fetchAll(\PDO::FETCH_ASSOC) as $user) {
                $users[$user["id"]] = $user;
            }
    
            $incidences[$incidence["id"]] = $incidence;
            $incidences[$incidence["id"]]["users"] = $users;
        }
        return $incidences;
    }





    public function updateIncidence($id,$name,$state,$priority,$description,$id_machine){
        $query="update machines set name='{$name}',state='{$state}',priority='{$priority}',description='{$description}',id_machine='{$id_machine}' where id='{$id}'";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }

    public function delete($id){
        $query="delete from incidence where id=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id"=>$id]);
    }
}  
      
