<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class incidencesController
{

    public function incidencesController($request, $response, $container)
    {

        $response->setTemplate("incidences.php");

        return $response;
    }

    public function addIncidences(Request $request, Response $response, Container $container): Response
    {
        $title = $request->get(INPUT_POST, "title");
        $description = $request->get(INPUT_POST, "description");
        $priority = $request->get(INPUT_POST, "priority");
        $state = $request->get(INPUT_POST, "state");
        $id_machine = $request->get(INPUT_POST, "id_machine");
        $incidences = $container->get("Incidences");
        $incidences->add($title, $description, $priority, $state, $id_machine);

        $response->redirect("location: /incidencias");
        return $response;
    }
}
