<?php

namespace App\Controllers;

class postlogin {

    public function postlogin($request, $response, $container){
        
        $response->setTemplate("postlogin.php");

        return $response;
    }
}