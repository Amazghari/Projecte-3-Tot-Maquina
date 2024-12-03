<?php
namespace App\Controllers;
class asignTechnicController {
    public function asignTechnicController($request, $response, $container){
        $response->setTemplate("asignTechnic.php");
        return $response;
    }
}