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
    
    public static function buscarMotivoEstadistica()
    {
        $sql ="SELECT 
        mot.mot_nombre AS descripcion,
        COUNT(*) AS cantidad
    FROM 
        incidente i
        INNER JOIN resolicion_incidente res_inc ON i.inc_id = res_inc.res_inc_incidente_id
        INNER JOIN motivos mot ON res_inc.res_motivo_id = mot.mot_id
    GROUP BY 
        mot.mot_nombre";

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
    public static function buscarPerpetradorEstadistica()
    {
        $sql ="SELECT 
        perp.perp_nombre AS descripcion,
        COUNT(*) AS cantidad
    FROM 
        incidente i
        INNER JOIN resolicion_incidente res_inc ON i.inc_id = res_inc.res_inc_incidente_id
        INNER JOIN perpetradores perp ON res_inc.res_perpetrador_id = perp.perp_id
    GROUP BY 
        perp.perp_nombre";

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
    
    
    
    
    
    public static function buscarEstado()
    {
        $sql ="SELECT 
        d.det_inc_estatus AS descripcion,
        COUNT(*) AS cantidad
    FROM 
        incidente i
        INNER JOIN detalle_inc d ON i.inc_id = d.det_inc_id_incidente
    WHERE 
        i.inc_situacion = 1
    GROUP BY 
        d.det_inc_estatus
    ORDER BY 
        d.det_inc_estatus";

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
    public static function buscarComponentes()
    {
        $sql ="SELECT 
        d.det_inc_estatus AS descripcion,
        COUNT(*) AS cantidad
    FROM 
        incidente i
        INNER JOIN detalle_inc d ON i.inc_id = d.det_inc_id_incidente
    WHERE 
        i.inc_situacion = 1
    GROUP BY 
        d.det_inc_estatus
    ORDER BY 
        d.det_inc_estatus";

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