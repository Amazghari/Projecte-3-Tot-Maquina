<?php

namespace App\Middleware;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class App {

    public static function execute(Request $request, Response $response, Container $container, $next) :Response
    {
        // Code before FrontConroller

        $response->set("app_config", $container["config"]);
        $user= $request->get("SESSION", "user");
        $logged = $request->get("SESSION", "logged");

        if (isset($logged) && $logged) {
            $response->set("app_logged", $logged);
            $response->set("app_user", $user);
        }
        
        //echo "App Middleware";
        $response = \Emeset\Middleware::next($request, $response, $container, $next);
        // Code after FrontConroller

        return $response;
    }
}