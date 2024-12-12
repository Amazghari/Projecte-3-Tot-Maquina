<?php

namespace App\Models;

use DateInterval;
use DateTime;

class Maintenance {
    private $sql;

    public function __construct($conn)
    {
        $this->sql = $conn;
    }

    public function getById($id){
        $query = "select * from maintenance where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id"=>$id
        ]);
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function add($data){
        if(!isset($data["preventive_time"])) {
            $query="insert into maintenance (title,state,type,frequency,description,maintentance_date,id_machine)
            values (:title ,:state,:type,:frequency,:description,:date,:idmachine)";
            $stm = $this->sql->prepare($query);
            $stm->execute([
                ":title"=>$data["title"],
                ":state"=>$data["status"],
                ":type"=>$data["type"],
                ":frequency"=>$data["preventive_time"],
                ":description"=>$data["description"],
                ":date"=>$data["date"],
                ":idmachine"=>$data["id_machine"]
            ]);

            $lastInsertId = $this->sql->lastInsertId(); // to get the maintenance id
            $query2="insert into user_maintenance (id_user,id_maintenance) values (:iduser,:idmaintenance)";
            $stm = $this->sql->prepare($query2);
            $stm->execute([
                ":iduser"=>$data["id_user"],
                ":idmaintenance"=>$lastInsertId
            ]);
        }
        // Here if it is preventive
        else {
            switch($data["preventive_time"]){
                case "Semanal":
                    $interval= 'W'; // Weekly
                    break;
                case "Mensual":
                    $interval= 'M'; // Monthly
                    break;
                case "Anual":
                    $interval= 'Y'; // Yearly
                    break;
            }
            for ($i = 0; $i < 4; $i++) { 
                // Create a new DateTime object for each iteration
                $date = new DateTime($data["date"]);
                
                // Add the interval for the current iteration
                $date->add(new DateInterval("P" . ($i + 1) . $interval)); // Increment by 1 month for each iteration
            
                // Format the date to 'Y-m-d'
                $dateFormatted = $date->format("Y-m-d");
            
                // Prepare and execute the insert query
                $query = "insert into maintenance (title, state, type, frequency, description, maintentance_date, id_machine)
                          values (:title, :state, :type, :frequency, :description, :date, :idmachine)";
                $stm = $this->sql->prepare($query);
                $stm->execute([
                    ":title" => $data["title"],
                    ":state" => $data["status"],
                    ":type" => $data["type"],
                    ":frequency" => $data["preventive_time"],
                    ":description" => $data["description"],
                    ":date" => $dateFormatted, // Use the formatted date
                    ":idmachine" => $data["id_machine"]
                ]);
            
                $lastInsertId = $this->sql->lastInsertId(); // Get the last inserted ID
                $query2 = "insert into user_maintenance (id_user, id_maintenance) values (:iduser, :idmaintenance)";
                $stm = $this->sql->prepare($query2);
                $stm->execute([
                    ":iduser" => $data["id_user"],
                    ":idmaintenance" => $lastInsertId
                ]);  
            }
        }   
    }

    // List of all maintenances for the admin/tech/supervisor views
    public function list (){
        $query = "select * from maintenance;";
        $maintenances = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $maintenance) {
            $maintenances[$maintenance["id"]] = $maintenance;
        }
        return $maintenances;
    }

    public function listByMachine($id){

       ;

        $query="select * from maintenance where id_machine=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id"=>$id
        ]);
        $maintenances = [];
        foreach ($stm->fetchAll(\PDO::FETCH_ASSOC) as $maintenance) {
            $maintenances[$maintenance["id"]] = $maintenance;
        }
        return $maintenances;
    }

    public function update($id,$title,$state,$description){
        $query="update maintenance set title=:title,state=:state,description=:description where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":title"=>$title,
            ":state"=>$state,
            ":description"=>$description,
            ":id"=>$id
        ]);
    }

    public function delete($id){
        $query="delete from maintenance where id=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id"=>$id]);
    }
}
