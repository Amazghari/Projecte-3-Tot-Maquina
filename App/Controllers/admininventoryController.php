<?php

namespace App\Controllers;

class admininventoryController {

    public function admininventoryController($request, $response, $container){

        $response->setTemplate("admininventory.php");

        return $response;
    }
}