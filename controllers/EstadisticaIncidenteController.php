<?php
namespace Controllers;
use Exception;
use Model\Incidente;
use MVC\Router;

class EstadisticaIncidenteController
{
    public static function index(Router $router)
    {
        $router->render('estadisticasincidentes/index', []);
    }
    /* FUNCION PARA MANDAR A LLAMAR LOS DATOS INCIDENTES DE EL 1 DIV EN LA VISTA */
    public static function buscarCategoriasEstadistica()
    {
        $sql = "SELECT UPPER(dci.det_categ_descripcion) descripcion, COUNT(*) AS cantidad
        FROM  incidente i        
        INNER JOIN detalle_categ_inc dci ON i.inc_id = dci.det_categ_id_incidente
        where inc_situacion = 1
        GROUP BY dci.det_categ_descripcion";

        try {

            $resultados = Incidente::fetchArray($sql);

            echo json_encode($resultados);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
            
        }
    }
/* FUNCION PARA MANDAR A LLAMAR LOS DATOS DE EL 2 DIV EN LA VISTA */
    public static function buscarTiposEstadistica()
    {
        $sql =" SELECT UPPER(cat_inc_decrip) descripcion, COUNT(*) AS cantidad
                FROM  incidente i        
                INNER JOIN detalle_categ_inc dci ON i.inc_id = dci.det_categ_id_incidente
                INNER JOIN categoria_incidente ci ON dci.det_categoria=ci.cat_inc_id
                where inc_situacion = 1
                GROUP BY cat_inc_decrip";

        try {

            $resultados = Incidente::fetchArray($sql);

            echo json_encode($resultados);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
            
        }
    }
  
 
}

