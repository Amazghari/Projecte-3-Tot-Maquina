<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;
class profileController {

    public function profileController($request, $response, $container){

        $userData = $_SESSION['user'];

        $response->set('userData', $userData);
        $response->setTemplate('profile.php');

        return $response;
    }

    public function updateProfile($request, $response, $container){

        $directory="/uploads/users/";

        $currentuser = $_SESSION['user'];
        $id = $request->get(INPUT_POST, "iduser");
        $name = $request->get(INPUT_POST, "name");
        $surname = $request->get(INPUT_POST, "surname");
        $username = $request->get(INPUT_POST, "username");
        $role = $request->get(INPUT_POST, "role");
        $image=$request->get("FILES","image");

        $image_url = $currentuser['img'];
        //dd($image['name'],$image_url);  

        if (($image['name']!="")) {
            $image_url = $directory . $image["name"];
            move_uploaded_file($image["tmp_name"], "uploads/users/" . $image["name"]);
        }
        
        //dd($image_url);

        $profiles = $container->get("Users");
        $profiles->updateProfile($id,$name,$surname,$username,$role,$image_url);
        $currentUser2= $profiles->getUser($username);

        $response->setSession("user", $currentUser2);
        //dd($_SESSION);

        $response->redirect("location: /perfil");
    
        return $response;

    }
}