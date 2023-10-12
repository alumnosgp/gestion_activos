<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\LoginController;
use Controllers\MenuController;


$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);
// /gestion_activos/menu/API/closeSessionAPI
$router->get('/', [LoginController::class,'index']);
$router->post('/API/login', [LoginController::class,'loginAPI']);
$router->get('/menu', [MenuController::class,'index']);
$router->get('/API/closeSession', [MenuController::class,'closeSessionAPI']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

