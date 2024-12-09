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
        $name = $request->get(INPUT_POST, "name");
        $state = $request->get(INPUT_POST, "state");
        $priority = $request->get(INPUT_POST, "priority");
        $description = $request->get(INPUT_POST, "description");
        $id_machine = $request->get(INPUT_POST, "id_machine");

        if ($id_machine === "") {
            $id_machine = NULL;
        }
        
        $incidences = $container->get("Incidences");
        $incidences->add($name, $state, $priority, $description, $id_machine);

        $response->redirect("location: /incidencias");
        return $response;
    }

    public function editIncidence($request, $response, $container){
        $incidences = $container->get("Incidences");
        $id = $request->getParam("id");
        $incidence = $incidences->getById($id);
        
        $response->set("incidence", $incidence);

        $response->setTemplate("editIncidence.php");
        return $response;
    }

    public function updateIncidence(Request $request, Response $response, Container $container) :Response{
        $id = $request->get(INPUT_POST, "id");
        $name = $request->get(INPUT_POST, "name");
        $state = $request->get(INPUT_POST, "state");
        $priority = $request->get(INPUT_POST, "priority");
        $description = $request->get(INPUT_POST, "description");
        $id_machine = $request->get(INPUT_POST, "id_machine");
        $incidences = $container->get("Incidences");
        $incidences->listupdate($id,$name,$state,$priority,$description,$id_machine);

        $response->redirect("location: /incidencias");
    
        return $response;
    }

    public function deleteIncidence($request, $response, $container){
    
            $id = $request->getParam('id');
            error_log("Recibido ID para eliminar: " . $id);
            
            if (!$id) {
                error_log("ID no recibido");
                $response->setStatus(400);
                return $response;
            }

            $incidences = $container->get("Incidences");
            $incidences->delete($id);
            $response->redirect("location: /incidencias");

          
            
            return $response;
        }
    
}
