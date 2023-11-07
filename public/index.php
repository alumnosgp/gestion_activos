<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\ArmaController;
use Controllers\GradoController;
use Controllers\PlazaController;
use Controllers\OfficeController;
use Controllers\OficinaController;
use Controllers\MaquinaController;
use Controllers\SistemaController;
use Controllers\AntiviruController;
use Controllers\PersonaltaController;
use Controllers\OrganizacionController;
use Controllers\PersonaplanillaController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);
$router->get('/', [AppController::class,'index']);

//sistemas
$router->get('/maquinas', [MaquinaController::class, 'index']);
$router->get('/API/maquinas/buscar', [MaquinaController::class, 'buscarApi']);
$router->post('/API/maquinas/guardar', [MaquinaController::class, 'guardarApi']);
$router->post('/API/maquinas/modificar', [MaquinaController::class, 'modificarApi']);
$router->post('/API/maquinas/eliminar', [MaquinaController::class, 'eliminarApi']);

//sistemas
$router->get('/sistemas', [SistemaController::class, 'index']);
$router->get('/API/sistemas/buscar', [SistemaController::class, 'buscarApi']);
$router->post('/API/sistemas/guardar', [SistemaController::class, 'guardarApi']);
$router->post('/API/sistemas/modificar', [SistemaController::class, 'modificarApi']);
$router->post('/API/sistemas/eliminar', [SistemaController::class, 'eliminarApi']);

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

//Personas alta
$router->get('/personasaltas', [PersonaltaController::class, 'index']);
$router->get('/API/personasaltas/buscar', [PersonaltaController::class, 'buscarApi']);
$router->post('/API/personasaltas/guardar', [PersonaltaController::class, 'guardarApi']);
$router->post('/API/personasaltas/modificar', [PersonaltaController::class, 'modificarApi']);
$router->post('/API/personasaltas/eliminar', [PersonaltaController::class, 'eliminarApi']);

//Personas planilleros
$router->get('/personasplanillas', [PersonaplanillaController::class, 'index']);
$router->get('/API/personasplanillas/buscar', [PersonaplanillaController::class, 'buscarApi']);
$router->post('/API/personasplanillas/guardar', [PersonaplanillaController::class, 'guardarApi']);
$router->post('/API/personasplanillas/modificar', [PersonaplanillaController::class, 'modificarApi']);
$router->post('/API/personasplanillas/eliminar', [PersonaplanillaController::class, 'eliminarApi']);

//grados
$router->get('/grados', [GradoController::class, 'index']);
$router->get('/API/grados/buscar', [GradoController::class, 'buscarApi']);
$router->post('/API/grados/guardar', [GradoController::class, 'guardarApi']);
$router->post('/API/grados/modificar', [GradoController::class, 'modificarApi']);
$router->post('/API/grados/eliminar', [GradoController::class, 'eliminarApi']);

//armas
$router->get('/armas', [ArmaController::class, 'index']);
$router->get('/API/armas/buscar', [ArmaController::class, 'buscarApi']);
$router->post('/API/armas/guardar', [ArmaController::class, 'guardarApi']);
$router->post('/API/armas/modificar', [ArmaController::class, 'modificarApi']);
$router->post('/API/armas/eliminar', [ArmaController::class, 'eliminarApi']);

//puestos
$router->get('/plazas', [PlazaController::class, 'index']);
$router->get('/API/plazas/buscar', [PlazaController::class, 'buscarApi']);
$router->post('/API/plazas/guardar', [PlazaController::class, 'guardarApi']);
$router->post('/API/plazas/modificar', [PlazaController::class, 'modificarApi']);
$router->post('/API/plazas/eliminar', [PlazaController::class, 'eliminarApi']);

//oficinas
$router->get('/oficinas', [OficinaController::class, 'index']);
$router->get('/API/oficinas/buscar', [OficinaController::class, 'buscarApi']);
$router->post('/API/oficinas/guardar', [OficinaController::class, 'guardarApi']);
$router->post('/API/oficinas/modificar', [OficinaController::class, 'modificarApi']);
$router->post('/API/oficinas/eliminar', [OficinaController::class, 'eliminarApi']);

//oficinas
$router->get('/organizaciones', [OrganizacionController::class, 'index']);
$router->get('/API/organizaciones/buscar', [OrganizacionController::class, 'buscarApi']);
$router->post('/API/organizaciones/guardar', [OrganizacionController::class, 'guardarApi']);
$router->post('/API/organizaciones/modificar', [OrganizacionController::class, 'modificarApi']);
$router->post('/API/organizaciones/eliminar', [OrganizacionController::class, 'eliminarApi']);



$router->comprobarRutas();