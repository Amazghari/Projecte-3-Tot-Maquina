<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;
class homeController {

    public function homeController($request, $response, $container)
    {
            $incidencesModel = $container->get("Incidences");
    
            $incidences = $incidencesModel->list();
    
            $response->set("incidences", $incidences);
    
            $response->setTemplate("home.php");
    
            return $response;
    }

}