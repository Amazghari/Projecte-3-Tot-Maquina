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
$app->route("/inicio", [\App\Controllers\homeController::class, "homeController"], [[\App\Middleware\auth::class, "auth"]]);
$app->route("/inventario", [\App\Controllers\inventoryController::class, "inventoryController"]);
$app->route("/incidencias", [\App\Controllers\incidencesController::class, "incidencesController"]);
$app->route("/mantenimiento_preventivo", [\App\Controllers\mantenimiento_preventivo::class, "mantenimiento_preventivo"]);
$app->route("/estadisticas", [\App\Controllers\estadisticas::class, "estadisticas"]);
$app->route("/paneladministrador", [\App\Controllers\admindashboardController::class, "admindashboardController"]);
$app->route("/adminmaquinas", [\App\Controllers\admininventoryController::class, "admininventoryController"]);
$app->route("/adminmantenimiento", [\App\Controllers\adminmaintenanceController::class, "adminmaintenanceController"]);
$app->route("/adminusuarios", [\App\Controllers\adminusersController::class, "adminusersController"]);
$app->route("/adminincidencias", [\App\Controllers\adminincidenceController::class, "adminincidenceController"]);
$app->route("/perfil", [\App\Controllers\profileController::class, "profileController"]);
$app->route("/inventario/editar/{id}", [\App\Controllers\inventoryController::class, "editMachine"]);
$app->post("/inventario/updateMachine", [\App\Controllers\inventoryController::class, "updateMachine"]);


$app->route("/mantenimiento", [\App\Controllers\maintenanceController::class, "maintenanceController"]);
$app->get("/login", [\App\Controllers\loginController::class, "index"]);
$app->post("/login",[\App\Controllers\loginController::class, "loginController"]);
$app->route("validar-login", "ctrlValidarLogin");
$app->route("privat", [\App\Controllers\Privat::class, "privat"], ["auth"]);
$app->route("tancar-sessio", "ctrlTancarSessio", ["auth"]);
$app->route("/logout", [\App\Controllers\loginController::class, "logout"],[[\App\Middleware\auth::class, "auth"]]);
$app->route("/inventario/addMachine", [\App\Controllers\inventoryController::class, "addMachine"]);



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
