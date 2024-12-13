<?php

namespace App\Controllers;

class admindashboardController {

    public function admindashboardController($request, $response, $container){
        // For get and show the total of incidences

        // Get the incidences model
        $incidencesModel = $container->get('Incidences');

        // call the method countIncidences() of model
        $totalIncidences = $incidencesModel->countIncidences();
        $response->set('totalIncidences', $totalIncidences);
        

        // set the view what do we want to render
        $response->setTemplate('admindashboard.php');

        return $response;
    }



}
