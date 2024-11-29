<?php

namespace App\Controllers;

class machineController {

    public function machineController($request, $response, $container){

        $response->setTemplate("machine.php");

        return $response;
    }
}