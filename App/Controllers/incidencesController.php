<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class incidencesController
{

    public function incidencesController($request, $response, $container)
    {
            $incidencesModel = $container->get("Incidences");
    
            $incidences = $incidencesModel->list();
    
            $response->set("incidences", $incidences);
    
            $response->setTemplate("incidences.php");
    
            return $response;
        }

    public function addIncidences(Request $request, Response $response, Container $container): Response
    {
        $title = $request->get(INPUT_POST, "title");
        $state = $request->get(INPUT_POST, "state");
        $priority = $request->get(INPUT_POST, "priority");
        $description = $request->get(INPUT_POST, "description");
        $id_machine = $request->get(INPUT_POST, "id_machine");
        $incidences = $container->get("Incidences");
        $incidences->add($title,$state,$priority,$description,$id_machine);

        $response->redirect("location: /incidencias");
        return $response;
    }

}
