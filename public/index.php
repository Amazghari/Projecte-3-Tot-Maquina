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

$app->route("", [\App\Controllers\indexController::class, "indexController"]); //el login
$app->route("/inicio", [\App\Controllers\homeController::class, "homeController"], [[\App\Middleware\auth::class, "auth"]]);
$app->get("/inventario", [\App\Controllers\inventoryController::class, "index"],[[\App\Middleware\auth::class, "auth"]]);
$app->route("/incidencias", [\App\Controllers\incidencesController::class, "incidencesController"],[[\App\Middleware\auth::class, "auth"]]);
$app->route("/paneladministrador", [\App\Controllers\admindashboardController::class, "admindashboardController"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/adminmaquinas", [\App\Controllers\admininventoryController::class, "admininventoryController"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/adminmantenimiento", [\App\Controllers\adminmaintenanceController::class, "adminmaintenanceController"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/adminusuarios", [\App\Controllers\adminusersController::class, "adminusersController"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/adminincidencias", [\App\Controllers\adminincidenceController::class, "adminincidenceController"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/perfil", [\App\Controllers\profileController::class, "profileController"],[[\App\Middleware\auth::class, "auth"]]);
$app->route("/asignar", [\App\Controllers\asignMachineController::class, "asignMachineController"]);
$app->route("/maquina", [\App\Controllers\machineController::class, "machineController"]);
$app->post("/inventario/eliminar/{id}", [\App\Controllers\inventoryController::class, "deleteMachine"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/inventario/editar/{id}", [\App\Controllers\inventoryController::class, "editMachine"]);
$app->post("/inventario/updateMachine", [\App\Controllers\inventoryController::class, "updateMachine"]);
$app->route("/maquina/{id}", [\App\Controllers\machineController::class, "machineController"]);
$app->post("/maquina/{id}", [\App\Controllers\machineController::class, "updateMachine"]);
$app->route("/incidencia/añadir", [\App\Controllers\incidencesController::class, "addIncidences"]);
$app->route("/incidencia/editar/{id}", [\App\Controllers\incidencesController::class, "editIncidence"]);
$app->post("/incidencia/updateIncidence", [\App\Controllers\incidencesController::class, "updateIncidence"]);
$app->get("/incidencia/eliminar/{id}", [\App\Controllers\incidencesController::class, "deleteIncidence"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->get('/incidencia/count', [\App\Controllers\incidencesController::class, 'listCount']);

$app->route("/perfil/updateProfile", [\App\Controllers\profileController::class, "updateProfile"]);

$app->route("/incidencia/{id}", [\App\Controllers\incidenceController::class, "incidenceController"]);
// $app->route("/mitrabajo", [\App\Controllers\myworkController::class, "myworkController"]);
$app->route("/adminusarios/añadir",[\App\Controllers\adminusersController::class, "addUser"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/mantenimientos", [\App\Controllers\maintenanceController::class, "maintenanceController"]);
$app->route("/mantenimiento", [\App\Controllers\maintenanceviewController::class, "maintenanceviewController"]);
$app->get("/login", [\App\Controllers\loginController::class, "index"]);
$app->post("/login",[\App\Controllers\loginController::class, "loginController"]);
$app->get("/logout", [\App\Controllers\loginController::class, "logout"],[[\App\Middleware\auth::class, "auth"]]);
$app->route("/inventario/añadir", [\App\Controllers\inventoryController::class, "addMachine"]);
$app->get("/adminusuarios/eliminar/{id}", [\App\Controllers\adminusersController::class, "deleteUser"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->get("/inventario/buscar", [\App\Controllers\inventoryController::class, "searchMachine"]);
$app->route("/incidencia", [\App\Controllers\incidenceController::class, "incidenceController"]);
$app->route("/asignarincidencia", [\App\Controllers\asignIncidencesController::class, "asignIncidencesController"]);
$app->route("/mantenimiento/añadir",[\App\Controllers\maintenanceController::class, "addMaintenance"],[[\App\Middleware\auth::class, "isUser"]]);
$app->route("/mantenimiento/updateMantenimiento", [\App\Controllers\maintenanceController::class, "updateMaintenance"]);
$app->route("/mantenimiento/hoursImputed", [\App\Controllers\incidencesController::class, "hoursImputed"]);
$app->route("/mantenimiento/{id}", [\App\Controllers\maintenanceController::class, "maintenanceView"],[[\App\Middleware\auth::class, "isUser"]]);
$app->route("/asignMantainment", [\App\Controllers\asignMantainmentController::class, "asignMantainmentController"]);
$app->route("/asignTechnic", [\App\Controllers\asignTechnicController::class, "asignTechnicController"]);
$app->route("/mantenimiento/editar/{id}", [\App\Controllers\maintenanceController::class, "maintenanceEdit"]);
$app->route("/mantenimiento/updateMantenimiento", [\App\Controllers\maintenanceController::class, "updateMaintenance"]);
$app->get("/mantenimiento/eliminar/{id}", [\App\Controllers\maintenanceController::class, "deleteMaintenance"],[[\App\Middleware\auth::class, "isAdmin"]]);
$app->route("/mitrabajo", [\App\Controllers\myworkController::class, "myWork"]);
$app->route("/mitrabajo", [\App\Controllers\myworkController::class, "myWork"]);
$app->route("/mitrabajo", [\App\Controllers\myworkController::class, "myWork"]);

$app->post("/asignarmaquinatecnico",[\App\Controllers\asignMachineController::class, "asignMachineTech"]);
$app->post("/asignarmantenimientotecnico",[\App\Controllers\asignMantainmentController::class, "asignMaintenanceTech"]);
$app->post("/asignarincidenciatecnico",[\App\Controllers\asignIncidencesController::class, "asignIncidenceTech"]);
$app->route("/asignartecnico",[\App\Controllers\asignIncidencesController::class, "asignIncidencesController"]);



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
