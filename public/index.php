<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\SistemaController;
use Controllers\AntiviruController;
use Controllers\OfficeController;
use Controllers\InventarioController;
$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

//sistemas
$router->get('/sistemas', [SistemaController::class, 'index']);
$router->get('/API/sistemas/buscar', [SistemaController::class, 'buscarApi']);
$router->post('/API/sistemas/guardar', [SistemaController::class, 'guardarApi']);
$router->post('/API/sistemas/modificar', [SistemaController::class, 'modificarApi']);
$router->post('/API/sistemas/eliminar', [SistemaController::class, 'aliminarApi']);


//antivirus
$router->get('/antivirus', [AntiviruController::class, 'index']);
$router->get('/API/antivirus/buscar', [AntiviruController::class, 'buscarApi']);
$router->post('/API/antivirus/guardar', [AntiviruController::class, 'guardarApi']);
$router->post('/API/antivirus/modificar', [AntiviruController::class, 'modificarApi']);
$router->post('/API/antivirus/eliminar', [AntiviruController::class, 'eliminarApi']);


//antivirus
$router->get('/offices', [OfficeController::class, 'index']);
$router->get('/API/offices/buscar', [OfficeController::class, 'buscarApi']);
$router->post('/API/offices/guardar', [OfficeController::class, 'guardarApi']);
$router->post('/API/offices/modificar', [OfficeController::class, 'modificarApi']);
$router->post('/API/offices/eliminar', [OfficeController::class, 'eliminarApi']);


//Inventarios
$router->get('/inventarios', [InventarioController::class, 'index']);
// $router->get('/API/offices/buscar', [OfficeController::class, 'buscarApi']);
// $router->post('/API/offices/guardar', [OfficeController::class, 'guardarApi']);
// $router->post('/API/offices/modificar', [OfficeController::class, 'modificarApi']);
// $router->post('/API/offices/eliminar', [OfficeController::class, 'eliminarApi']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
