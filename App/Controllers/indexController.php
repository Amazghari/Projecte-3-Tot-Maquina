<?php

namespace App\Controllers;

class indexController
{

    public function indexController($request, $response, $container)
    {
        $response->SetTemplate("index.php");

        return $response;
    }
}
