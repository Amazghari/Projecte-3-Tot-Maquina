<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class inventoryController {

    public function inventoryController($request, $response, $container){
        $machinesModel = $container->get("Machines");

        $machines = $machinesModel->list();

        $response->set("machines", $machines);

        $response->setTemplate("inventory.php");

        return $response;
    }

    public function updateMachine($request, $response, $container){

        $id = $request->get(INPUT_POST, "id");
        $name = $request->get(INPUT_POST, "name");
        $model = $request->get(INPUT_POST, "model");
        $manufacturer = $request->get(INPUT_POST, "manufacturer");
        $serial_num = $request->get(INPUT_POST, "serial_num");
        $installation_date = $request->get(INPUT_POST, "installation_date");
        $location = $request->get(INPUT_POST, "location");
        $image_url = $request->get(INPUT_POST, "image_url");

        $machines = $container->get("Machines");
        $machines->update($id,$name,$model,$manufacturer,$serial_num,$installation_date,$location,$image_url);

        $response->redirect("location: /inventory");
    
        return $response;
    }
}