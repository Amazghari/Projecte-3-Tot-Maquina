<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class inventoryController {

    public function index($request, $response, $container){
        $machinesModel = $container->get("Machines");

        $machines = $machinesModel->list();

        $response->set("machines", $machines);

        $response->setTemplate("inventory.php");

        return $response;
    }

    public function editMachine($request, $response, $container){
        $machines = $container->get("Machines");
        $id = $request->getParam("id");
        $machine = $machines->getById($id);
        
        $response->set("machine", $machine);

        $response->setTemplate("editmachine.php");
        return $response;
    }

    public function updateMachine($request, $response, $container){

        $directory="/uploads/machines/";
        $id = $request->get(INPUT_POST, "id");
        $name = $request->get(INPUT_POST, "name");
        $model = $request->get(INPUT_POST, "model");
        $manufacturer = $request->get(INPUT_POST, "manufacturer");
        $serial_num = $request->get(INPUT_POST, "serial_num"); 
        $longitude = $request->get(INPUT_POST, "longitude");
        $latitude = $request->get(INPUT_POST, "latitude");
        $image=$request->get("FILES","image");
        $image_url=$directory.$image["name"];
        move_uploaded_file($image["tmp_name"],"uploads/machines//".$image["name"]);
        $machines = $container->get("Machines");
        $machines->update($id,$name,$model,$manufacturer,$serial_num,$longitude,$latitude,$image_url);

        $response->redirect("location: /inventario");
    
        return $response;
    }

    public function addMachine(Request $request, Response $response, Container $container) :Response
    {
        $directory="/uploads/machines/"; 
       $name=$request->get(INPUT_POST,"machineName");
       $model=$request->get(INPUT_POST,"model");
       $manufacturer=$request->get(INPUT_POST,"manufacturer");
       $serial_num=$request->get(INPUT_POST,"serialNumber");
       $installation_date=$request->get(INPUT_POST,"installationDate");
       $longitude=$request->get(INPUT_POST,"longitude");
       $latitude=$request->get(INPUT_POST,"latitude");
       $image=$request->get("FILES","image");
       $image_url=$directory.$image["name"];
       move_uploaded_file($image["tmp_name"],"uploads/machines//".$image["name"]);
       //dd($_POST,$_FILES,$image_url);
       $machines = $container->get("Machines");
       $machines->add($name,$model,$manufacturer,$serial_num,$installation_date,$longitude,$latitude,$image_url);
  
        $response->redirect("location: /inventario");
        return $response;
    }

    public function deleteMachine($request, $response, $container){
        try {
            $id = $request->getParam('id');
            error_log("Recibido ID para eliminar: " . $id);
            
            if (!$id) {
                error_log("ID no recibido");
                $response->setStatus(400);
                return $response;
            }

            $machines = $container->get("Machines");
            $result = $machines->delete($id);
          
            
            return $response;
        } catch (\Exception $e) {
            error_log("Error al eliminar el equipo: " . $e->getMessage());
            
            return $response;
        }
    }
}