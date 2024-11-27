<?php 

    namespace App\Controllers;

    class incidencesController{

        public function incidencesController($request, $response, $container){

            $response->setTemplate("incidences.php");
            
            return $response;
        }
    }