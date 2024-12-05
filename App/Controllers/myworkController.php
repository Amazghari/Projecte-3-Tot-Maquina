<?php


namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class myworkController {

    public function myworkController($request, $response, $container){

        $response->setTemplate("mywork.php");

        $machinesModel = $container->get("Machines");

        $machines = $machinesModel->list();

        $response->set("machines", $machines);
        $incidencesModel = $container->get("Incidences");
    
        $incidences = $incidencesModel->list();

        $response->set("incidences", $incidences);

        return $response;
    }


}
