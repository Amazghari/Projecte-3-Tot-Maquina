<?php

namespace App\Controllers;

class adminusersController {

    public function adminusersController($request, $response, $container){

        $response->setTemplate("adminusers.php");

        return $response;
    }
}