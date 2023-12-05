<?php 
require_once __DIR__ . '/../includes/app.php';


use Controllers\ImpactoController;
use MVC\Router;
use Controllers\AppController;
use Controllers\LoginController;
use Controllers\MenuController;
use Controllers\ArmaController;
use Controllers\GradoController;
use Controllers\PlazaController;
use Controllers\OfficeController;
use Controllers\OficinaController;
use Controllers\MaquinaController;
use Controllers\SistemaController;
use Controllers\ReporteController;
use Controllers\AntiviruController;
use Controllers\IncidenteController;
use Controllers\CategoriaController;
use Controllers\TipoEfectoController;
use Controllers\PonderacionController;
use Controllers\PersonaltaController;
use Controllers\ReporteincController;
use Controllers\ConclusionController;
use Controllers\ComponenteController;
use Controllers\PerpetradorController;
use Controllers\EstadisticaController;
use Controllers\OrganizacionController;
use Controllers\PersonaplanillaController;
use Controllers\InstitucionesintController;
use Controllers\InstitucionesextController;
use Controllers\MotivoPerpetradorController;
use Controllers\EstadisticaincidenteController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);
$router->get('/', [AppController::class,'index']);

//login
$router->get('/', [LoginController::class,'index']);
$router->post('/API/login', [LoginController::class,'loginAPI']);
$router->get('/menu', [MenuController::class,'index']);
$router->get('/API/closeSession', [MenuController::class,'closeSessionAPI']);

//sistemas
$router->get('/maquinas', [MaquinaController::class, 'index']);
$router->get('/API/maquinas/buscar', [MaquinaController::class, 'buscarApi']);
$router->post('/API/maquinas/guardar', [MaquinaController::class, 'guardarApi']);
$router->post('/API/maquinas/modificar', [MaquinaController::class, 'modificarApi']);
$router->post('/API/maquinas/eliminar', [MaquinaController::class, 'eliminarApi']);
$router->get('/API/maquinas/buscarNombres', [MaquinaController::class, 'buscarNombresApi']);
$router->get('/API/maquinas/buscarPlanillero', [MaquinaController::class, 'buscarPlanilleroAPI']);
$router->get('/API/maquinas/validarDireccionMAC', [MaquinaController::class, 'validarDireccionMAC']);


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


//reporteria
$router->get('/pdf', [ReporteController::class,'pdf']);
$router->get('/getMaquina', [ReporteController::class,'pdf']);
// $router->get('/API/reporte/generar', [ReporteController::class, 'pdf']);


//estadisticas
$router->get('/estadisticas', [EstadisticaController::class, 'index']);
$router->get('/API/estadisticas/buscarDatosEstadistica', [EstadisticaController::class, 'buscarDatosEstadistica']);
$router->get('/API/estadisticas/buscarDatosEstadisticaSoftware', [EstadisticaController::class, 'buscarDatosSoftware']);
$router->get('/API/estadisticas/buscarDatosEstadisticaAntivirus', [EstadisticaController::class, 'buscarDatosAntivirus']);
$router->get('/API/estadisticas/buscarDatosEstadisticaMaquinas', [EstadisticaController::class, 'buscarDatosMaquinas']);




//////////////////////////////GESTION DE INCIDENTES//////////////////////////////////////////
///Incidentes///
$router->get('/incidentes', [IncidenteController::class, 'index']);
$router->get('/API/incidentes/buscar', [IncidenteController::class, 'buscarApi']);
$router->post('/API/incidentes/guardar', [IncidenteController::class, 'guardarApi']);
$router->post('/API/incidentes/guardarModal', [IncidenteController::class, 'guardarModal']);
$router->post('/API/incidentes/modificarDescrip', [IncidenteController::class, 'modificarDescrip']);
$router->post('/API/incidentes/modificarCategoria', [IncidenteController::class, 'modificarCategoria']);
$router->post('/API/incidentes/modificarFecha', [IncidenteController::class, 'modificarFecha']);
$router->get('/API/incidentes/buscarNoInc', [IncidenteController::class, 'buscarApi1']);
$router->get('/API/incidentes/buscarDatosPorCatalogoIrt', [IncidenteController::class, 'buscarDatosPorCatalogoIrtApi']);
$router->get('/API/incidentes/buscarDatosPorCatalogoRep', [IncidenteController::class, 'buscarDatosPorCatalogoRepApi']);
$router->get('/API/incidentes/buscarCatalogoInv', [IncidenteController::class, 'buscarCatalogoInv']);


//estadisticasIncidentes
$router->get('/estadisticasincidentes', [EstadisticaincidenteController::class, 'index']);
$router->get('/API/estadisticasincidentes/buscaCategoriaIncidentes', [EstadisticaincidenteController::class, 'buscarCategoriasEstadistica']);
$router->get('/API/estadisticasincidentes/buscarTipoIncidentes', [EstadisticaincidenteController::class, 'buscarTiposEstadistica']);
$router->get('/API/estadisticasincidentes/buscarPerpetradorIncidentes', [EstadisticaincidenteController::class, 'buscarPerpetradorEstadistica']);
$router->get('/API/estadisticasincidentes/buscarMotivoIncidentes', [EstadisticaincidenteController::class, 'buscarMotivoIncidentes']);
$router->get('/API/estadisticasincidentes/buscarEstado', [EstadisticaincidenteController::class, 'buscarEstado']);
$router->get('/API/estadisticasincidentes/buscarComponentes', [EstadisticaincidenteController::class, 'buscarComponentes']);



///////////////////////////reporte incidente////////////////////////////////////////
$router->get('/pdfInc', [ReporteincController::class,'pdfInc']);
$router->get('/IncidentePDF', [ReporteincController::class,'pdfInc']);
$router->get('/prueba', [ReporteincController::class,'pdfimprime']);



//perpetradores
$router->get('/perpetradores', [PerpetradorController::class, 'index']);
$router->get('/API/perpetradores/buscar', [PerpetradorController::class, 'buscarApi']);
$router->post('/API/perpetradores/guardar', [PerpetradorController::class, 'guardarApi']);
$router->post('/API/perpetradores/modificar', [PerpetradorController::class, 'modificarApi']);
$router->post('/API/perpetradores/eliminar', [PerpetradorController::class, 'eliminarApi']);


//motivos
$router->get('/motivos_perpetradores', [MotivoPerpetradorController::class, 'index']);
$router->get('/API/motivos_perpetradores/buscar', [MotivoPerpetradorController::class, 'buscarApi']);
$router->post('/API/motivos_perpetradores/guardar', [MotivoPerpetradorController::class, 'guardarApi']);
$router->post('/API/motivos_perpetradores/modificar', [MotivoPerpetradorController::class, 'modificarApi']);
$router->post('/API/motivos_perpetradores/eliminar', [MotivoPerpetradorController::class, 'eliminarApi']);


//conclusiones
$router->get('/conclusiones', [ConclusionController::class, 'index']);
$router->get('/API/conclusiones/buscar', [ConclusionController::class, 'buscarApi']);
$router->post('/API/conclusiones/guardar', [ConclusionController::class, 'guardarApi']);
$router->post('/API/conclusiones/modificar', [ConclusionController::class, 'modificarApi']);
$router->post('/API/conclusiones/eliminar', [ConclusionController::class, 'eliminarApi']);


//INTERNAS
$router->get('/inst_internas', [InstitucionesintController::class, 'index']);
$router->get('/API/inst_internas/buscar', [InstitucionesintController::class, 'buscarApi']);
$router->post('/API/inst_internas/guardar', [InstitucionesintController::class, 'guardarApi']);
$router->post('/API/inst_internas/modificar', [InstitucionesintController::class, 'modificarApi']);
$router->post('/API/inst_internas/eliminar', [InstitucionesintController::class, 'eliminarApi']);


//EXTERNAS
$router->get('/inst_externas', [InstitucionesextController::class, 'index']);
$router->get('/API/inst_externas/buscar', [InstitucionesextController::class, 'buscarApi']);
$router->post('/API/inst_externas/guardar', [InstitucionesextController::class, 'guardarApi']);
$router->post('/API/inst_externas/modificar', [InstitucionesextController::class, 'modificarApi']);
$router->post('/API/inst_externas/eliminar', [InstitucionesextController::class, 'eliminarApi']);


//COMPONENTES
$router->get('/compo_activos', [ComponenteController::class, 'index']);
$router->get('/API/compo_activos/buscar', [ComponenteController::class, 'buscarApi']);
$router->post('/API/compo_activos/guardar', [ComponenteController::class, 'guardarApi']);
$router->post('/API/compo_activos/modificar', [ComponenteController::class, 'modificarApi']);
$router->post('/API/compo_activos/eliminar', [ComponenteController::class, 'eliminarApi']);


//CATEGORIAS
$router->get('/categorias', [CategoriaController::class, 'index']);
$router->get('/API/categorias/buscar', [CategoriaController::class, 'buscarApi']);
$router->post('/API/categorias/guardar', [CategoriaController::class, 'guardarApi']);
$router->post('/API/categorias/modificar', [CategoriaController::class, 'modificarApi']);
$router->post('/API/categorias/eliminar', [CategoriaController::class, 'eliminarApi']);


//EFECTOS
$router->get('/efectosAbv', [TipoEfectoController::class, 'index']);
$router->get('/API/efectosAbv/buscar', [TipoEfectoController::class, 'buscarApi']);
$router->post('/API/efectosAbv/guardar', [TipoEfectoController::class, 'guardarApi']);
$router->post('/API/efectosAbv/modificar', [TipoEfectoController::class, 'modificarApi']);
$router->post('/API/efectosAbv/eliminar', [TipoEfectoController::class, 'eliminarApi']);


//PONDERACIONES
$router->get('/ponderaciones', [PonderacionController::class, 'index']);
$router->get('/API/ponderaciones/buscar', [PonderacionController::class, 'buscarApi']);
$router->post('/API/ponderaciones/guardar', [PonderacionController::class, 'guardarApi']);
$router->post('/API/ponderaciones/modificar', [PonderacionController::class, 'modificarApi']);
$router->post('/API/ponderaciones/eliminar', [PonderacionController::class, 'eliminarApi']);


//IMPACTO
$router->get('/impacto', [ImpactoController::class, 'index']);
$router->get('/API/impacto/buscar', [ImpactoController::class, 'buscarApi']);
$router->post('/API/impacto/guardar', [ImpactoController::class, 'guardarApi']);
$router->post('/API/impacto/modificar', [ImpactoController::class, 'modificarApi']);
$router->post('/API/impacto/eliminar', [ImpactoController::class, 'eliminarApi']);



$router->comprobarRutas();
