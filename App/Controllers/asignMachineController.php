<?php

namespace App\Controllers;

class asignMachineController {

    public function asignMachineController($request, $response, $container){

        $response->setTemplate("asignMachine.php");

        return $response;
    }
}