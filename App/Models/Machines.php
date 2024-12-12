<?php

namespace App\Models;

class Machines
{
    private $sql;
    public function __construct($conn)
    {
        $this->sql = $conn;
    }
//add machine
    public function add($name,$model,$manufacturer,$serial_num,$installation_date,$longitude,$latitude,$image_url)
    {
        $query="insert into machines (name,model,manufacturer,serial_num,installation_date,longitude,latitude,image_url) values (:name,:model,:manufacturer,:serial_num,:installation_date,:longitude,:latitude,:image_url)"; 
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":name"=>$name,
            ":model"=>$model,
            ":manufacturer"=>$manufacturer,
            ":serial_num"=>$serial_num,
            ":installation_date"=>$installation_date,
            ":longitude"=>$longitude,
            ":latitude"=>$latitude,
            ":image_url"=>$image_url
        ]);
    }

    //select from machines
    public function list()
    {
        $query = "select * from machines;";
        $machines = [];
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $machine) {
            $machines[$machine["id"]] = $machine;
        }
        return $machines;
    }
//update machines
    public function update($id,$name,$model,$manufacturer,$serial_num,$longitude,$latitude,$image_url){
        $query="update machines set name=:name,model=:model,manufacturer=:manufacturer,serial_num=:serial_num,
        longitude=:longitude,latitude=:latitude,image_url=:image_url where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":name"=>$name,
            ":model"=>$model,
            ":manufacturer"=>$manufacturer,
            ":serial_num"=>$serial_num,
            ":longitude"=>$longitude,
            ":latitude"=>$latitude,
            ":image_url"=>$image_url,
            ":id"=>$id
        ]);
    }
//delete machine
    public function delete($id){
        $query="delete from machines where id=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id"=>$id]);
    }

    //assign tech to machine
    public function asssignTech($id,$iduser){
        $query="select * from user_machines where id_machine=:id and id_user=:iduser";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":id"=>$id,
            ":iduser"=>$iduser
        ]);
        
        // Fetch the result as an associative array.
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

       if(!$result){
        $query2="insert into user_machines (id_user,id_machine) values (:iduser,:id)";
       }
       else {
        $query2="update user_machines set id_user=:iduser where id_machine=:id";
       }
       $stm = $this->sql->prepare($query2);
        $stm->execute([
            ":id"=>$id,
            ":iduser"=>$iduser
        ]);
    }
// get machine by ID
    public function getById($id){
        $query="select * from machines where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id"=>$id]);
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateMachine($id,$name,$model,$manufacturer,$longitude, $latitude){
        $query="update machines set name=:name,model=:model,manufacturer=:manufacturer,longitude=:longitude,latitude=:latitude where id=:id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":name"=>$name,
            ":model"=>$model,
            ":manufacturer"=>$manufacturer,
            ":longitude"=>$longitude,
            ":latitude"=>$latitude,
            ":id"=>$id
        ]);
    }
    
//search By Name
    public function searchByName($name){
        $machines = [];
        $query = "SELECT * FROM machines WHERE name LIKE :name";
        $stm = $this->sql->prepare($query);
        $searchTerm = "%" . $name . "%";
        $stm->bindParam(':name', $searchTerm, \PDO::PARAM_STR);
        $stm->execute();
        
        foreach ($stm->fetchAll(\PDO::FETCH_ASSOC) as $machine) {
            $machines[$machine["id"]] = $machine;
        }
        return $machines;
    }

    public function myMachine()
    {
        // Recupera el ID del usuario de la sesión
        $userId = $_SESSION['user']['id'];
            
        // Consulta para obtener los mantenimientos relacionados con el usuario
        $query = "select m.* from machines m inner join user_machine um on m.id = um.id_machine WHERE um.id_user = :userId;
        ";
    
        $maintenances = [];
    
        // Preparar y ejecutar la consulta con PDO
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
        $stmt->execute();
    
        // Recorrer los resultados y almacenarlos en un array
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $machine) {
            $maintenances[$machine["id"]] = $machine;
        }
    
        return $maintenances;
    }

   
    
}
