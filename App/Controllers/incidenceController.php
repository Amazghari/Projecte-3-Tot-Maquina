<?php

namespace App\Controllers;

class incidenceController {

    public function incidenceController($request, $response, $container){

        $response->setTemplate("incidence.php");

        return $response;
    }
}