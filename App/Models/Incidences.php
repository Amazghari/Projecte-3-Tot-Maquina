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

    public function hoursimputed($id, $imputed_hours){
        $query = "update incidence set imputed_hours = :imputed_hours where id = :id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":imputed_hours"=>$imputed_hours,":id"=>$id]);

    }

    // Method for count the incidences
    public function countIncidences()
    {
        // Write the SQL query for count the incidences
        $query = "SELECT COUNT(*) as total FROM incidence";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of incidences)
        return $result['total'];
    }

 

    public function myIncidence()
    {
        // Recupera el ID del usuario de la sesión
        $userId = $_SESSION['user']['id'];
            
        // Consulta para obtener los mantenimientos relacionados con el usuario
        $query = "select i.* from incidence i inner join user_incidence ui on i.id = ui.id_incidence WHERE ui.id_user = :userId;
        ";
    
        $maintenances = [];
    
        // Preparar y ejecutar la consulta con PDO
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
        $stmt->execute();
    
        // Recorrer los resultados y almacenarlos en un array
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $incidence) {
            $maintenances[$incidence["id"]] = $incidence;
        }
    
        return $maintenances;
    }
}  
      
