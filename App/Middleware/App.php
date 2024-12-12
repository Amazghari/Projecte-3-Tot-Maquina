<?php

namespace App\Middleware;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class App {

    public static function execute(Request $request, Response $response, Container $container, $next) :Response
    {
        // Code before FrontController

        $response->set("app_config", $container["config"]); // Set app configuration in response
        $user = $request->get("SESSION", "user"); // Get user from session
        $logged = $request->get("SESSION", "logged"); // Check if user is logged in

        if (isset($logged) && $logged) {
            $response->set("app_logged", $logged); // Set logged status in response
            $response->set("app_user", $user); // Set user in response
        }
        
        //echo "App Middleware"; // Optional debug output
        $response = \Emeset\Middleware::next($request, $response, $container, $next); // Proceed to the next middleware

        // Code after FrontController

        return $response; // Return the response
    }
}