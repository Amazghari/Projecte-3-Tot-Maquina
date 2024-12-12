<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class profileController {

    public function profileController($request, $response, $container) {
        $userData = $_SESSION['user']; // Get user data from session

        $response->set('userData', $userData); // Set user data in response
        $response->setTemplate('profile.php'); // Set the template for the response

        return $response; // Return the response
    }

    public function updateProfile($request, $response, $container) {
        $directory = "/uploads/users/"; // Directory for user uploads

        $currentuser = $_SESSION['user']; // Get current user from session
        $id = $request->get(INPUT_POST, "iduser"); // Get user ID from POST request
        $name = $request->get(INPUT_POST, "name"); // Get name from POST request
        $surname = $request->get(INPUT_POST, "surname"); // Get surname from POST request
        $username = $request->get(INPUT_POST, "username"); // Get username from POST request
        $image = $request->get("FILES", "image"); // Get uploaded image

        $image_url = $currentuser['img']; // Default image URL
        // dd($image['name'], $image_url);  

        if (($image['name'] != "")) {
            $image_url = $directory . $image["name"]; // Set new image URL
            move_uploaded_file($image["tmp_name"], "uploads/users/" . $image["name"]); // Move uploaded file
        }
        
        // dd($image_url);

        $profiles = $container->get("Users"); // Get Users service from container
        $profiles->updateProfile($id, $name, $surname, $username, $image_url); // Update user profile
        $currentUser2 = $profiles->getUser($username); // Get updated user data

        $response->setSession("user", $currentUser2); // Update session with new user data
        // dd($_SESSION);

        $response->redirect("location: /perfil"); // Redirect to profile page
    
        return $response; // Return the response
    }
}