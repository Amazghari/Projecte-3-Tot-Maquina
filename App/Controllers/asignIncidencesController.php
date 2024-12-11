<?php

namespace App\Controllers;

class asignIncidencesController {

    public function asignIncidencesController($request, $response, $container){

        $userModel = $container->get("Users");

        $techs=$userModel->listTechs();
        $maintenancesModel = $container->get("Maintenances");
        $maintenances=$maintenancesModel->list();

        $response->set("techs", $techs);
        $response->set("maintenances", $maintenances);
        $response->setTemplate("asignMantainment.php");
        return $response;
    }


    public function asignMaintenanceTech($request, $response, $container){
        //dd($_POST);
        $relationTable = $container->get("User_maintenance");
        // Get the arrays from POST using the correct array notation
        $tech_ids = $_POST['tech_id'];
    
        $maintenance_ids = $_POST['maintenance_id'];
        //dd($tech_ids, $machine_ids);

        
        // Loop through the arrays together
        foreach ($tech_ids as $index => $tech_id) {
            if ($tech_id != "") {
              $relationTable->assignTech( $tech_id, $maintenance_ids[$index]);
            }
        }

        $response->redirect("location: /inventario");

        return $response;
        

    }
}