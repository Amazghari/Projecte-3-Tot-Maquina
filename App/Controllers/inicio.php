<?php

namespace App\Controllers;

class inicio {

    public function inicio($request, $response, $container){

        $response->setTemplate("inicio.php");

        return $response;
    }
}