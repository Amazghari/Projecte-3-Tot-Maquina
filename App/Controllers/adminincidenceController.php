<?php

namespace App\Controllers;

class adminincidenceController {

    public function adminincidenceController($request, $response, $container){

        $response->setTemplate("adminincidence.php");

        return $response;
    }
}