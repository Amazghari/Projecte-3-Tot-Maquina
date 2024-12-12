<?php

namespace App\Controllers;

class asignMachineController {

    public function asignMachineController($request, $response, $container){
        $userModel = $container->get("Users");
        $techs=$userModel->listTechs();
        $machinesModel = $container->get("Machines");
        $machines=$machinesModel->list();
        $response->set("techs", $techs);
        $response->set("machines", $machines);
        $response->setTemplate("asignMachine.php");

        return $response;
    }

    public function asignMachineTech($request, $response, $container){
        $relationTable = $container->get("User_machine");
        //$prueba=$request->getRaw(INPUT_POST,"tech_id");
        //dd($prueba,$_POST);
        // Get the arrays from POST using the correct array notation
        $tech_ids = $request->get(INPUT_POST,  "tech_id", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    
        $machine_ids = $request->get(INPUT_POST,  "machine_id", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        //dd($tech_ids, $machine_ids);

        
        // Loop through the arrays together
        foreach ($tech_ids as $index => $tech_id) {
            if ($tech_id != "") {
              $relationTable->assignTech( $tech_id, $machine_ids[$index]);
            }
        }

        $response->redirect("location: /inventario");

        return $response;
        

    }
}