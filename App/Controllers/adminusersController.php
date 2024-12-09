<?php

namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class adminusersController {

    public function adminusersController($request, $response, $container){
        $usersModel = $container->get("Users");

        $users = $usersModel->list();

        $response->set("users", $users);
        $response->setTemplate("adminusers.php");

        return $response;
    }

    function addUser(Request $request, Response $response, Container $container): Response 
    {
      $name = $request->get(INPUT_POST, "name");
      $surname = $request->get(INPUT_POST, "surname");
      $email = $request->get(INPUT_POST, "email");
      $role = $request->get(INPUT_POST, "role");
      $username = $request->get(INPUT_POST, "username");
      $image = "/uploads/users/imagen_predefinida.png";
      $password = password_hash($request->get(INPUT_POST, "passwordUser"),PASSWORD_BCRYPT);
      $users = $container->get("Users");
      $users->add($name,$surname,$email,$role,$username,$image,$password);
      $response->redirect("location:/adminusuarios");
        return $response;
    }

    function deleteUser(Request $request, Response $response, Container $container): Response 
    {
      $id = $request->getParam("id");
      $users = $container->get("Users");
      $users->delete($id);
      $response->redirect("location:/adminusuarios");
        return $response;
    }
}