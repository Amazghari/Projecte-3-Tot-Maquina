<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;
class incidenceController
{

    public function incidenceController($request, $response, $container)
    {
        
        $incidencesModel = $container->get("Incidences");
        $id = $request->getParam("id");
        // dd($id);
        $userIncidence = $incidencesModel->myIncidenceView($id);

        $response->set("userIncidence", $userIncidence);
        
        
        $incidence = $incidencesModel->getById($id);
        
        $response->set("incidence", $incidence);
        
        $response->setTemplate("incidence.php");

        return $response;
    }
}