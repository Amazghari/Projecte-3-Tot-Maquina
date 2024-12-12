<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

/**
 * Example login controller for the Emeset Framework
 * Example framework for M07 Web Application Development.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Loads the login page
 *
 **/

/**
 * ctrlLogin: Controller that loads the login page
 *
 * @param $request HTTP request content.
 * @param $response HTTP response content.
 * @param array $config application configuration parameters
 *
 **/
class loginController {

    public Container $contenidor; // Dependency injection for the container

    public function __construct(Container $contenidor) {
        $this->contenidor = $contenidor; // Initialize the container
    }
    
    public function index($request, $response, $container) {
        $response->setTemplate("index.php"); // Set the template for the login page
        return $response; // Return the response
    }

    function loginController(Request $request, Response $response, Container $container): Response {
        $username = $request->get(INPUT_POST, "username"); // Get username from POST request
        $password = $request->get(INPUT_POST, "password"); // Get password from POST request

        $users = $container->get("Users"); // Get Users service from container
        $currentUser = $users->getUser($username); // Get user details by username

        // Check if the user exists
        if (!$currentUser) {
            $response->setSession("error", "Incorrect username or password!"); // Set error message
            $response->setSession("logged", false); // Set logged status to false
            $response->redirect("location:/"); // Redirect to home
        } else {
            $passwordEqual = password_verify($password, $currentUser["password"]); // Verify password

            // If the user is an administrator and the password is correct
            if ($currentUser && $passwordEqual) {
                if ($currentUser["role"] == "administrator") {
                    $response->setSession("isAdmin", true); // Set admin status
                }
                $response->setSession("user", $currentUser); // Set user in session
                $response->setSession("logged", true); // Set logged status to true
                $response->redirect("location: /inicio"); // Redirect to home
            } else {
                $response->setSession("error", "Incorrect username or password!"); // Set error message
                $response->setSession("logged", false); // Set logged status to false
                $response->redirect("location:/"); // Redirect to home
            }
        }
        
        $response->setTemplate("/inicio"); // Set the template for the home page
        return $response; // Return the response
    }

    function logout(Request $request, Response $response, Container $container): Response {
        if (isset($_SESSION["user"])) {
            // If it exists, delete the user session.
            $response->unsetSession("user"); // Unset user session
            // Redirect the user to the homepage after logging out.
            $response->redirect("location:/"); // Redirect to home
        }

        // If no active session, still redirect to the homepage.
        $response->redirect("location:/"); // Redirect to home
        return $response; // Return the response
    }
}