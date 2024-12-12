<?php

namespace App\Controllers;

class asignIncidencesController {

    public function asignIncidencesController($request, $response, $container){

        $userModel = $container->get("Users");

        $techs=$userModel->listTechs();
        $incidencesModel = $container->get("Incidences");
        $incidences=$incidencesModel->list();

        $response->set("techs", $techs);
        $response->set("incidences", $incidences);
        $response->setTemplate("asignIncidences.php");
        return $response;
    }


    public function asignIncidenceTech($request, $response, $container){
        //dd($_POST);
        //$prueba=$request->get(INPUT_POST,  "tech_id", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        //dd($prueba);
        $relationTable = $container->get("User_incidences");
        // Get the arrays from POST using the correct array notation
        $tech_ids = $request->get(INPUT_POST,  "tech_id", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        
        $incidence_ids = $request->get(INPUT_POST,  "incidence_id", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        //dd($tech_ids, $machine_ids);

        //dd($tech_ids,$incidence_ids);
        // Loop through the arrays together
        foreach ($tech_ids as $index => $tech_id) {
            if ($tech_id != "") {
              $relationTable->assignTech( $tech_id, $incidence_ids[$index]);
            }
        }

        $response->redirect("location: /incidencias");

        return $response;
        

    }
}