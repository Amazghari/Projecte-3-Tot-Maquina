<?php
namespace App\Controllers;
class asignMantainmentController {
    public function asignMantainmentController($request, $response, $container){
        $response->setTemplate("asignMantainment.php");
        return $response;
    }
}