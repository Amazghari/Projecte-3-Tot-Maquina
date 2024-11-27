<?php
namespace App\Middleware;
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

/**
 * Middleware que gestiona l'autenticació
 *
 * @param \Emeset\Contracts\Http\Request $request petició HTTP
 * @param \Emeset\Contracts\Http\Response $response resposta HTTP
 * @param \Emeset\Contracts\Container $container  
 * @param callable $next  següent middleware o controlador.   
 * @return \Emeset\Contracts\Http\Response resposta HTTP
 */
class auth{
    function auth(Request $request, Response $response, Container $container, $next) : Response
    {
    
        $user = $request->get("SESSION", "user");
        $logged = $request->get("SESSION", "logged");
    
        if (!isset($logged)) {
            $user = "";
            $logged = false;
        }
    
        $response->set("usuari", $user);
        $response->set("logat", $logged);
    
        // si l'usuari està logat permetem carregar el recurs
        if ($logged) {
            $response = \Emeset\Middleware::next($request, $response, $container, $next);
        } else {
            $response->redirect("location: '' ");
        }
        return $response;
    }

}

