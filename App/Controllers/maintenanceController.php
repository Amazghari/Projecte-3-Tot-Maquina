<?php

namespace App\Controllers;

use DateTime;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class maintenanceController {
    
    public function maintenanceController($request, $response, $container){

        $machinesModel = $container->get("Machines");
        $machines = $machinesModel->list();
        $maintenanceModel = $container->get("Maintenances");
        $maintenances = $maintenanceModel->list();
        $response->set("machines", $machines);
        $response->set("maintenances", $maintenances);

        $response->setTemplate("maintenance.php");

        return $response;
    }

    public function maintenanceView($request, $response, $container){

        $maintenanceModel = $container->get("Maintenances");
        $id=$request->getParam("id");
        $maintenance = $maintenanceModel->getById($id);
        
        $response->set("maintenance", $maintenance);

        $response->setTemplate("maintenanceview.php");

        return $response;
    }

    public function addMaintenance(Request $request, Response $response, Container $container) :Response
    {
        $maintenanceModel = $container->get("Maintenances");
        $data=[
            "id_user"=>$request->get(INPUT_POST,"iduser"),
            "title"=>$request->get(INPUT_POST,"title"),
            "type"=>$request->get(INPUT_POST,"type"),
            "status"=>$request->get(INPUT_POST,"status"),
            "preventive_time"=>$request->get(INPUT_POST,"preventive_time"),
            "description"=>$request->get(INPUT_POST,"description"),
            "date"=>$request->get(INPUT_POST,"date"),
            "id_machine"=>$request->get(INPUT_POST,"id_machine"),
            "status"=>$request->get(INPUT_POST,"status")
        ];
        $date= new DateTime($data["date"]);
        $data["date"]= $date->format("Y-m-d");
        //dd($data,$_POST);
        $maintenanceModel->add($data);

        $response->redirect("location: /mantenimientos");


        return $response;
    }

    public function maintenanceEdit($request, $response, $container){
        $maintenances = $container->get("Maintenances");
        $id = $request->getParam("id");
        $maintenance = $maintenances->getById($id);
        
        $response->set("maintenance", $maintenance);

        $response->setTemplate("editmaintenance.php");
        return $response;
    }

    public function updateMaintenance($request, $response, $container){

        $id = $request->get(INPUT_POST, "id");
        $title = $request->get(INPUT_POST, "title");
        $state = $request->get(INPUT_POST, "state");
        $description = $request->get(INPUT_POST, "description");

        // dd($_POST);
        

        $machines = $container->get("Maintenances");
        $machines->update($id,$title,$state,$description);

        

        $response->redirect("location: /mantenimientos");
    
        return $response;
    }
}