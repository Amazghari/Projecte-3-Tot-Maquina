<?php

/**
 * Front controler
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Aquest Framework implementa el mínim per tenir un MVC per fer pràctiques
 * de M07.
 * @author: Dani Prados dprados@cendrassos.net
 * @version 0.4.0
 *
 * Punt d'netrada de l'aplicació exemple del Framework Emeset.
 * Per provar com funciona es pot executer php -S localhost:8000 a la carpeta public.
 * I amb el navegador visitar la url http://localhost:8000/
 *
 */

use \Emeset\Contracts\Routers\Router;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";
//include "../App/Controllers/index.php";
include "../App/Controllers/error.php";

include "../App/Controllers/validarLogin.php";
include "../App/Controllers/tancarSessio.php";
include "../App/Middleware/auth.php";
include "../App/Middleware/test.php";

/* Creem els diferents models */
$contenidor = new \App\Container(__DIR__ . "/../App/config.php"); 

$app = new \Emeset\Emeset($contenidor);
$app->middleware([\App\Middleware\App::class, "execute"]);

$app->route("", [\App\Controllers\indexController::class, "indexController"]);
$app->route("/inicio", [\App\Controllers\homeController::class, "homeController"]);
$app->route("/inventario", [\App\Controllers\inventoryController::class, "inventoryController"]);
$app->route("/incidencias", [\App\Controllers\incidencias::class, "incidencias"]);
$app->route("/mantenimiento_preventivo", [\App\Controllers\mantenimiento_preventivo::class, "mantenimiento_preventivo"]);
$app->route("/estadisticas", [\App\Controllers\estadisticas::class, "estadisticas"]);
$app->route("/paneladministrador", [\App\Controllers\admindashboardController::class, "admindashboardController"]);
$app->route("/perfil", [\App\Controllers\perfil::class, "perfil"]);  
$app->route("/mantenimiento", [\App\Controllers\maintenanceController::class, "maintenanceController"]);

$app->route("/mantenimiento", [\App\Controllers\mantenimiento::class, "mantenimiento"]);
$app->route("/login",[\App\Controllers\loginController::class, "loginController"]);
$app->route("validar-login", "ctrlValidarLogin");
$app->route("privat", [\App\Controllers\Privat::class, "privat"], ["auth"]);
$app->route("tancar-sessio", "ctrlTancarSessio", ["auth"]);



$app->route("ajax", function ($request, $response) {
    $response->set("result", "ok");
    return $response;
});

$app->route("/hola/{id}", function ($request, $response) {
    $id = $request->getParam("id");
    $response->setBody("Hola {$id}!");
    return $response;
});

$app->route(Router::DEFAULT_ROUTE, "ctrlError");
$app->execute();
