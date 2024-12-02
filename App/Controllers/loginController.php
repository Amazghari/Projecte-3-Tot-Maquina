<?php
namespace App\Controllers;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

/**
 * Controlador de login d'exemple del Framework Emeset
 * Framework d'exemple per a M07 Desenvolupament d'aplicacions web.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Carrega la pàgina de login
 *
 **/

/**
 * ctrlLogin: Controlador que carrega  la pàgina de login
 *
 * @param $request contingut de la peticó http.
 * @param $response contingut de la response http.
 * @param array $config  paràmetres de configuració de l'aplicació
 *
 **/
class loginController{

  public Container $contenidor;

    public function __construct(Container $contenidor)
    {
        $this->contenidor = $contenidor;
    }
    
    public function index($request, $response, $container)
    {
        $response->SetTemplate("index.php");

        return $response;
    }

  function loginController(Request $request, Response $response, Container $container): Response
  {
    $username = $request->get(INPUT_POST, "username");
    $password = $request->get(INPUT_POST, "password");
    //dd($username, $password);
    $users = $container->get("Users");
    $currentUser= $users->getUser($username);
    //hashedpwd $2y$10$axv2WdgCaQqzp870IsMEG.L4TNSRRFD6u3W.7IIw7Tsp4PS1RMhEy
    // dd(password_hash($password,PASSWORD_BCRYPT));
    //dd(password_verify($password,'$2y$10$axv2WdgCaQqzp870IsMEG.L4TNSRRFD6u3W.7IIw7Tsp4PS1RMhEy'));
    //dd($eqpwd);
    if(!$currentUser){
      $response->setSession("error", "Usuari o clau incorrectes!");
      $response->setSession("logged", false);
      $response->redirect("location:/"); 
    }
    else{
      $passwordequal = password_verify($password, $currentUser["password"]);
      //dd($username,$password,$passwordequal,$currentUser);
      //  if($currentUser["role"]=="administrator" && $passwordequal){
      //   $response->setSession("user",$currentUser);
      //   $response->setSession("logged",true);
      //   $response->setSession("isAdmin",true);
      //   $response->redirect("location: /inicio");
      // }
       if($currentUser && $passwordequal){
        if($currentUser["role"]=="administrator"){
          $response->setSession("isAdmin",true); 
        }
        $response->setSession("user", $currentUser);
        $response->setSession("logged", true);
        $response->redirect("location: /inicio");
      }

      else {
        $response->setSession("error", "Usuari o clau incorrectes!");
        $response->setSession("logged", false);
        $response->redirect("location:/"); 
      }
    }
    
    $response->SetTemplate("/inicio");

    return $response;
}

function logout(Request $request, Response $response, Container $container): Response
  {
    if (isset($_SESSION["user"])) {

      // If it exists, delete the user session.
      $response->unsetSession("user");

      // Redirect the user to the homepage after logging out.
      $response->redirect("location:/");
    }

    // If no active session, still redirect to the homepage.
    $response->redirect("location:/");

    // Return the final response.
    return $response;
  }


}

