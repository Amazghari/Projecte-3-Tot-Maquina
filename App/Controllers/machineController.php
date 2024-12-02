<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;
class machineController {

    public function machineController($request, $response, $container){

        $machinesModel = $container->get("Machines");
        $id = $request->getParam("id");

        $machine = $machinesModel->getById($id);

        $response->set("machine", $machine);

        $response->setTemplate("machine.php");

        return $response;
    }

    public function updateMachine($request, $response, $container){
      
        $id = $request->get(INPUT_POST, "machineId");
        $name = $request->get(INPUT_POST, "name");
        $model = $request->get(INPUT_POST, "model");
        $manufacturer = $request->get(INPUT_POST, "manufacturer");
        $longitude = $request->get(INPUT_POST, "longitude");
        $latitude = $request->get(INPUT_POST, "latitude");
        $machines = $container->get("Machines");
        $machines->updateMachine($id,$name,$model,$manufacturer,$longitude,$latitude);

        $response->redirect("location: /maquina/$id");
    
        return $response;
    }
}