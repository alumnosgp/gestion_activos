<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\ArmaController;
use Controllers\GradoController;
use Controllers\PuestoController;
use Controllers\OfficeController;
use Controllers\OficinaController;
use Controllers\SistemaController;
use Controllers\PersonaController;
use Controllers\AntiviruController;
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

//Offices
$router->get('/offices', [OfficeController::class, 'index']);
$router->get('/API/offices/buscar', [OfficeController::class, 'buscarApi']);
$router->post('/API/offices/guardar', [OfficeController::class, 'guardarApi']);
$router->post('/API/offices/modificar', [OfficeController::class, 'modificarApi']);
$router->post('/API/offices/eliminar', [OfficeController::class, 'eliminarApi']);

//Personas
$router->get('/personas', [PersonaController::class, 'index']);
$router->get('/API/personas/buscar', [PersonaController::class, 'buscarApi']);
$router->post('/API/personas/guardar', [PersonaController::class, 'guardarApi']);
$router->post('/API/personas/modificar', [PersonaController::class, 'modificarApi']);
$router->post('/API/personas/eliminar', [PersonaController::class, 'aliminarApi']);

//grados
$router->get('/grados', [GradoController::class, 'index']);
$router->get('/API/grados/buscar', [GradoController::class, 'buscarApi']);
$router->post('/API/grados/guardar', [GradoController::class, 'guardarApi']);
$router->post('/API/grados/modificar', [GradoController::class, 'modificarApi']);
$router->post('/API/grados/eliminar', [GradoController::class, 'aliminarApi']);

//armas
$router->get('/armas', [ArmaController::class, 'index']);
$router->get('/API/armas/buscar', [ArmaController::class, 'buscarApi']);
$router->post('/API/armas/guardar', [ArmaController::class, 'guardarApi']);
$router->post('/API/armas/modificar', [ArmaController::class, 'modificarApi']);
$router->post('/API/armas/eliminar', [ArmaController::class, 'aliminarApi']);

//puestos
$router->get('/puestos', [PuestoController::class, 'index']);
$router->get('/API/puestos/buscar', [PuestoController::class, 'buscarApi']);
$router->post('/API/puestos/guardar', [PuestoController::class, 'guardarApi']);
$router->post('/API/puestos/modificar', [PuestoController::class, 'modificarApi']);
$router->post('/API/puestos/eliminar', [PuestoController::class, 'aliminarApi']);

//oficinas
$router->get('/oficinas', [OficinaController::class, 'index']);
$router->get('/API/oficinas/buscar', [OficinaController::class, 'buscarApi']);
$router->post('/API/oficinas/guardar', [OficinaController::class, 'guardarApi']);
$router->post('/API/oficinas/modificar', [OficinaController::class, 'modificarApi']);
$router->post('/API/oficinas/eliminar', [OficinaController::class, 'aliminarApi']);




//Inventarios
$router->get('/inventarios', [InventarioController::class, 'index']);
// $router->get('/API/offices/buscar', [OfficeController::class, 'buscarApi']);
// $router->post('/API/offices/guardar', [OfficeController::class, 'guardarApi']);
// $router->post('/API/offices/modificar', [OfficeController::class, 'modificarApi']);
// $router->post('/API/offices/eliminar', [OfficeController::class, 'eliminarApi']);

$router->comprobarRutas();