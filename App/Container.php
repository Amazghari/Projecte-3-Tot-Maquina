<?php


namespace App;

use Emeset\Container as EmesetContainer;

class Container extends EmesetContainer {

    public function __construct($config){
        parent::__construct($config);
        
        $this["\App\Controllers\Privat"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Privat($c);
        };

        $this["db"] = function ($c) {
            
            $config =  $c->get("config");
            
            $db = new \App\Models\Db($config["db"]["user"],
            $config["db"]["pass"],
            $config["db"]["name"], 
            $config["db"]["host"]);
            return $db;
        };

        $this["\App\Controllers\loginController"] = function ($c) {
            return new \App\Controllers\loginController($c);
        };
        $this["Users"] = function ($c) {
            $db= $c->get("db");
            $users = new \App\Models\Users($db->getConnection());
            return $users;
        };


    }
}