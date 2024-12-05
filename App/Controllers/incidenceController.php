<?php

namespace App\Controllers;

class incidenceController
{

    public function incidenceController($request, $response, $container)
    {

        $incidencesModel = $container->get("Incidences");
        $id = $request->getParam("id");

        $incidence = $incidencesModel->getById($id);

        $response->set("incidence", $incidence);

        $response->setTemplate("incidence.php");

        return $response;
    }
}