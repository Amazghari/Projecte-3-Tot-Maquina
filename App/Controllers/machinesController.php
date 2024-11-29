<?php
namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;


class machinesController {

    public Container $contenidor;

    public function __construct(Container $contenidor)
    {
        $this->contenidor = $contenidor;
    }

    public function addMachine(Request $request, Response $response, Container $container) :Response
    {
       $name=$request->get(INPUT_POST,"machineName");
       $model=$request->get(INPUT_POST,"model");
       $manufacturer=$request->get(INPUT_POST,"manufacturer");
       $serial_num=$request->get(INPUT_POST,"serialNumber");
       $installation_date=$request->get(INPUT_POST,"installationDate");
       $location=$request->get(INPUT_POST,"location");
       $image_url=$request->get(INPUT_POST,"image");
       dd($_POST);
       $machines = $container->get("Machines");
       $machines->add($model,$manufacturer,$serial_num,$installation_date,$location,$image_url);
  
        $response->SetTemplate("inventory.php");
        return $response;
    }
}