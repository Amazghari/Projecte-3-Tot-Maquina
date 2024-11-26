<?php

namespace App\Controllers;

class inicioController {

    public function inicioController($request, $response, $container){

        $response->setTemplate("inicio.php");

        return $response;
    }
}