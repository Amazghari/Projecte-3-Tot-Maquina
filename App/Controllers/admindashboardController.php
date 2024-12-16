<?php

namespace App\Controllers;

class admindashboardController {

    public function admindashboardController($request, $response, $container){
        // For get and show the total of incidences

        // Get the incidences model
        $incidencesModel = $container->get('Incidences');

        // call the method countIncidences() of model
        $totalIncidences = $incidencesModel->countIncidences();
        $totalLowPriorityIncidences = $incidencesModel->countLowPriorityIncidences();
        $totalMediumPriorityIncidences = $incidencesModel->countMediumPriorityIncidences();
        $totalHighPriorityIncidences = $incidencesModel->countHighPriorityIncidences();
        $totalCompletedIncidences = $incidencesModel->countCompletedIncidences();
        $totalOpenedIncidences = $incidencesModel->countOpenedIncidences();
        $totalMaintenance = $incidencesModel->countMaintenance();
        $totalCompletedMaintenance = $incidencesModel->countCompletedMaintenance();
        $totalUsers = $incidencesModel->countUsers();
        $totalMachines = $incidencesModel->countMachines();
        $totalProgrammedMaintenance = $incidencesModel->countProgrammedMaintenance();
        $totalTechnics = $incidencesModel->countTechnics();

        $response->set('totalIncidences', $totalIncidences);
        $response->set('totalLowPriorityIncidences',$totalLowPriorityIncidences);
        $response->set('totalMediumPriorityIncidences',$totalMediumPriorityIncidences);
        $response->set('totalHighPriorityIncidences',$totalHighPriorityIncidences);
        $response->set('totalCompletedIncidences',$totalCompletedIncidences);
        $response->set('totalOpenedIncidences',$totalOpenedIncidences);
        $response->set('totalMaintenance',$totalMaintenance);
        $response->set('totalCompletedMaintenance',$totalCompletedMaintenance);
        $response->set('totalUsers',$totalUsers);
        $response->set('totalMachines',$totalMachines);
        $response->set('totalProgrammedMaintenance',$totalProgrammedMaintenance);
        $response->set('totalTechnics',$totalTechnics);


        // set the view what do we want to render
        $response->setTemplate('admindashboard.php');

        return $response;
    }



}
