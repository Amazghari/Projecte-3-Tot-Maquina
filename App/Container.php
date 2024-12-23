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

        $this["Machines"] = function ($c) {
            $db= $c->get("db");
            $users = new \App\Models\Machines($db->getConnection());
            return $users;
        };

        $this["Incidences"] = function ($c) {
            $db= $c->get("db");
            $users = new \App\Models\Incidences($db->getConnection());
            return $users;
        };

        $this["Maintenances"] = function ($c) {
            $db= $c->get("db");
            $maintenances = new \App\Models\Maintenance($db->getConnection());
            return $maintenances;
        };

        $this["User_machine"] = function ($c) {
            $db= $c->get("db");
            $user_machine = new \App\Models\User_machine($db->getConnection());
            return $user_machine;
        };

        $this["User_maintenance"] = function ($c) {
            $db= $c->get("db");
            $user_maintenance = new \App\Models\User_maintenance($db->getConnection());
            return $user_maintenance;
        };

        $this["User_incidences"] = function ($c) {
            $db= $c->get("db");            
            $user_incidences = new \App\Models\User_incidences($db->getConnection());
            return $user_incidences;
        };

    }


    
}