<?php

namespace App\Controllers;

class profileController {

    public function profileController($request, $response, $container){

        $response->setTemplate("profile.php");

        return $response;
    }
}