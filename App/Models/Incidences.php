<?php

namespace App\Models;

class Incidences
{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }
    // add new incidance
    public function add($name, $state, $priority, $description, $id_machine)
    {
        $query = "insert into incidence (name,state,priority,description,id_machine,starting_date) values (:name,:state,:priority,:description,:id_machine,CURDATE())";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":name" => $name,
            ":state" => $state,
            ":priority" => $priority,
            ":description" => $description,
            ":id_machine" => $id_machine
        ]);
    }
    //select from incidances
    public function list()
    {
        $query = "select * from incidence;";
        $incidences = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $incidence) {
            $incidences[$incidence["id"]] = $incidence;
        }
        return $incidences;
    }
    // get incidences by ID
    public function getById($id)
    {
        $query = "select * from incidence where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id" => $id]);
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    // get all incidences
    public function listEdit()
    {
        $query = "select * from incidence;";
        $incidences = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $incidence) {
            $incidences[$incidence["id"]] = $incidence;
        }
        return $incidences;
    }

    public function listupdate($id, $name, $state, $priority, $description, $id_machine)
    {
        $query = "update incidence set name=:name, state=:state, priority=:priority, description=:description, id_machine=:id_machine where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id" => $id,
            ":name" => $name,
            ":state" => $state,
            ":priority" => $priority,
            ":description" => $description,
            ":id_machine" => $id_machine
        ]);
    }


    public function listByMachine($id)
    {

        $subquery = "select users.name,users.id, id_incidence from user_incidence join users on users.id=user_incidence.id_user where id_incidence=:id;";
        //dd($subquery);
        $query = "select * from incidence where id_machine=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id" => $id
        ]);
        $incidences = [];
        $users = [];
        foreach ($stm->fetchAll(\PDO::FETCH_ASSOC) as $incidence) {
            $stm = $this->sql->prepare($subquery);
            $result = $stm->execute([
                ":id" => $incidence["id"]
            ]);
            foreach ($stm->fetchAll(\PDO::FETCH_ASSOC) as $user) {
                $users[$user["id"]] = $user;
            }

            $incidences[$incidence["id"]] = $incidence;
            $incidences[$incidence["id"]]["users"] = $users;
        }
        return $incidences;
    }





    public function updateIncidence($id, $name, $state, $priority, $description, $id_machine)
    {
        $query = "update machines set name='{$name}',state='{$state}',priority='{$priority}',description='{$description}',id_machine='{$id_machine}' where id='{$id}'";
        $stm = $this->sql->prepare($query);
        $stm->execute();
    }

    public function delete($id)
    {
        $query = "delete from incidence where id=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id" => $id]);
    }

    public function hoursimputed($id,$priority ,$state, $imputed_hours, $first_answer, $end_date)
    {
        // dd($id,$imputed_hours);
        $query = "update incidence set priority = :priority, state = :state, imputed_hours = :imputed_hours, first_answer = :first_answer, end_date = :end_date where id = :id";
        $stm = $this->sql->prepare($query);
        $stm->execute(["state" => $state, "priority" => $priority, "end_date" => $end_date, "first_answer" => $first_answer, ":imputed_hours" => $imputed_hours, ":id" => $id]);
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


    // Method for count low priority from incidences
    public function countLowPriorityIncidences()
    {
        // Write the SQL query for count low priority from incidences
        $query = "SELECT COUNT(*) as total FROM incidence where priority='baja'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of low priority incidences)
        return $result['total'];
    }


    // Method for count high priority from incidences
    public function countHighPriorityIncidences()
    {
        // Write the SQL query for count high priority from incidences
        $query = "SELECT COUNT(*) as total FROM incidence where priority='alta'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of high priority incidences)
        return $result['total'];
    }


    // Method for count medium priority from incidences
    public function countMediumPriorityIncidences()
    {
        // Write the SQL query for count medium priority from incidences
        $query = "SELECT COUNT(*) as total FROM incidence where priority='media'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of medium priority incidences)
        return $result['total'];
    }


    // Method for count completed incidences
    public function countCompletedIncidences()
    {
        // Write the SQL query for count completed incidences
        $query = "SELECT COUNT(*) as total FROM incidence where state='finalizado'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of completed incidences)
        return $result['total'];
    }


    // Method for count opened incidences
    public function countOpenedIncidences()
    {
        // Write the SQL query for count opened incidences
        $query = "SELECT COUNT(*) as total FROM incidence where state='en proceso'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of opened incidences)
        return $result['total'];
    }


    // Method for count total maintenance
    public function countMaintenance()
    {
        // Write the SQL query for count total maintenance
        $query = "SELECT COUNT(*) as total FROM maintenance";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of total maintenance)
        return $result['total'];
    }


    // Method for count completed maintenance
    public function countCompletedMaintenance()
    {
        // Write the SQL query for count completed maintenance
        $query = "SELECT COUNT(*) as total FROM maintenance WHERE state='completado'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of completed maintenance)
        return $result['total'];
    }


    // Method for count total users
    public function countUsers()
    {
        // Write the SQL query for count total users
        $query = "SELECT COUNT(*) as total FROM users";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of total users)
        return $result['total'];
    }


    // Method for count total machines
    public function countMachines()
    {
        // Write the SQL query for count total machines
        $query = "SELECT COUNT(*) as total FROM machines";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of total machines)
        return $result['total'];
    }


    // Method for count total maintenance
    public function countProgrammedMaintenance()
    {
        // Write the SQL query for count total maintenance
        $query = "SELECT COUNT(*) as total FROM maintenance WHERE state='programado'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of total maintenance)
        return $result['total'];
    }


    // Method for count total machines
    public function countTechnics()
    {
        // Write the SQL query for count total machines
        $query = "SELECT COUNT(*) as total FROM users WHERE role='tecnico'";

        // Execute the query and get the result
        $result = $this->sql->query($query, \PDO::FETCH_ASSOC)->fetch();

        // we return the result (the total of total machines)
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

    public function myIncidenceView()
    {
        // Recupera el ID del usuario de la sesión
        $userId = $_SESSION['user']['id'];

        // Consulta para obtener los mantenimientos relacionados con el usuario
        $query = "select u.* from users u inner join user_incidence ui on u.id = ui.id_incidence WHERE ui.id_user = :userId;
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
