<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class admininventoryController {

    public function admininventoryController($request, $response, $container){
        $machinesModel = $container->get("Machines");

        $machines = $machinesModel->list();

        $response->set("machines", $machines);

        $response->setTemplate("admininventory.php");

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

        $id = $request->get(INPUT_POST, "id");
        $name = $request->get(INPUT_POST, "name");
        $model = $request->get(INPUT_POST, "model");
        $manufacturer = $request->get(INPUT_POST, "manufacturer");
        $serial_num = $request->get(INPUT_POST, "serial_num"); 
        $location = $request->get(INPUT_POST, "location");
        $image_url = $request->get(INPUT_POST, "image_url");
        $machines = $container->get("Machines");
        $machines->update($id,$name,$model,$manufacturer,$serial_num,$location,$image_url);

        $response->redirect("location: /admininventario");
    
        return $response;
    }

    public function addMachine( $request, Response $response, Container $container) :Response
    {
        $directory="/uploads/machines/"; 
       $name=$request->get(INPUT_POST,"machineName");
       $model=$request->get(INPUT_POST,"model");
       $manufacturer=$request->get(INPUT_POST,"manufacturer");
       $serial_num=$request->get(INPUT_POST,"serialNumber");
       $installation_date=$request->get(INPUT_POST,"installationDate");
       $location=$request->get(INPUT_POST,"location");
       $image=$request->get("FILES","image");
       $image_url=$directory.$image["name"];
       move_uploaded_file($image["tmp_name"],"uploads/machines//".$image["name"]);
       //dd($_POST,$_FILES,$image_url);
       $machines = $container->get("Machines");
       $machines->add($name,$model,$manufacturer,$serial_num,$installation_date,$location,$image_url);
  
        $response->redirect("location: /admininventario");
        return $response;
    }
} 