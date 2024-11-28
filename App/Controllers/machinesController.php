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
}