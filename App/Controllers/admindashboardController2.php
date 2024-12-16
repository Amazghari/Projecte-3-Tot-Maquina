<?php

namespace App\Controllers;

class admindashboardController2{

    public function admindashboardController2($request, $response, $container){
        // For get and show the total of incidences

        // Get the incidences model
        $incidencesModel = $container->get('Incidences');

        // call the method countLowPriorityIncidences() of model
        $totalLowPriorityIncidences = $incidencesModel->countLowPriorityIncidences();
        $response->set('totalLowPriorityIncidences', $totalLowPriorityIncidences);
        

        // set the view what do we want to render
        $response->setTemplate('admindashboard.php');

        return $response;
    }
}