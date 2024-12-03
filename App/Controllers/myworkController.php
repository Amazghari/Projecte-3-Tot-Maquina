<?php

namespace App\Controllers;

class myworkController {

    public function myworkController($request, $response, $container){

        $response->setTemplate("mywork.php");

        return $response;
    }
}