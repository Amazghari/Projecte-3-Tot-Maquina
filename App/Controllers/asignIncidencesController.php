<?php

namespace App\Controllers;

class asignIncidencesController {

    public function asignIncidencesController($request, $response, $container){
        

        $response->setTemplate("asignincidences.php");

        return $response;
    }
}