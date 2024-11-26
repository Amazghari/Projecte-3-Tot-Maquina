<?php

namespace App\Controllers;

class inventoryController {

    public function inventoryController($request, $response, $container){

        $response->setTemplate("inventory.php");

        return $response;
    }
}