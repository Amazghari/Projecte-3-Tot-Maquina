<?php
namespace App\Middleware;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

/**
 * Middleware that manages authentication
 *
 * @param \Emeset\Contracts\Http\Request $request HTTP request
 * @param \Emeset\Contracts\Http\Response $response HTTP response
 * @param \Emeset\Contracts\Container $container  
 * @param callable $next  next middleware or controller.   
 * @return \Emeset\Contracts\Http\Response HTTP response
 */
class auth{
    function auth(Request $request, Response $response, Container $container, $next) : Response
    {
        $user = $request->get("SESSION", "user"); // Get user from session
        $logged = $request->get("SESSION", "logged"); // Check if user is logged in
    
        if (!isset($logged)) {
            $user = ""; // Set user to empty if not logged in
            $logged = false; // Set logged to false
        }
    
        $response->set("user", $user); // Set user in response
        $response->set("logged", $logged); // Set logged status in response
    
        // If the user is logged in, let us load the resource
        if ($logged) {
            $response = \Emeset\Middleware::next($request, $response, $container, $next); // Proceed to the next middleware
        } else {
            $response->redirect("location: / "); // Redirect to home if not logged in
        }
        return $response; // Return the response
    }

    function isAdmin(Request $request, Response $response, Container $container, $next) : Response{
        $user = $request->get("SESSION", "user"); // Get user from session
        $logged = $request->get("SESSION", "logged"); // Check if user is logged in

        if($user["role"] == "administrator" && $logged){
            return \Emeset\Middleware::next($request, $response, $container, $next); // Proceed if user is admin
        }
        else {
            $response->redirect("location: /inicio "); // Redirect if not admin
        }
        return $response; // Return the response
    }

    function isTechnician(Request $request, Response $response, Container $container, $next) : Response{
        $user = $request->get("SESSION", "user"); // Get user from session
        $logged = $request->get("SESSION", "logged"); // Check if user is logged in

        if(($user["role"] == "tecnico" || $user["role"] == "adminstrator") && $logged){
            return \Emeset\Middleware::next($request, $response, $container, $next); // Proceed if user is technician or administrator
        }
        else {
            $response->redirect("location: /inicio "); // Redirect if not technician
        }
        return $response; // Return the response
    }

    function isSupervisor(Request $request, Response $response, Container $container, $next) : Response{
        $user = $request->get("SESSION", "user"); // Get user from session
        $logged = $request->get("SESSION", "logged"); // Check if user is logged in

        if(($user["role"] == "supervisor" || $user["role"] == "adminstrator") && $logged){
            return \Emeset\Middleware::next($request, $response, $container, $next); // Proceed if user is supervisor or administrator
        }
        else {
            $response->redirect("location: /inicio "); // Redirect if not supervisor
        }   
        return $response; // Return the response
    }

    function isUser(Request $request, Response $response, Container $container, $next) : Response{
        $user = $request->get("SESSION", "user"); // Get user from session
        $logged = $request->get("SESSION", "logged"); // Check if user is logged in

        if($user["role"] == "usuario" && $logged){
            $response->redirect("location: /inicio"); // Redirect if user is a regular user
        }
        else {
            return \Emeset\Middleware::next($request, $response, $container, $next); // Proceed if not a regular user
        }
        return $response; // Return the response
    }



}

