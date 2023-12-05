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

    public static function buscarCategoriasEstadistica()
    {
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFin = $_GET['fechaFin'];

        $condicionFecha = '';
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $fechaIniFormat = date('m-d-Y', strtotime($fechaInicio));
            $fechaFinFormat = date('m-d-Y', strtotime($fechaFin));
            $condicionFecha = " AND DATE(inc_fecha) BETWEEN '$fechaIniFormat' AND '$fechaFinFormat' ";
        }

        $sql = "SELECT UPPER(dci.det_categ_descripcion) AS descripcion, COUNT(*) AS cantidad
                FROM incidente i        
                INNER JOIN detalle_categ_inc dci ON i.inc_no_incidente = dci.det_categ_id_incidente
                WHERE inc_situacion = 1 $condicionFecha
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

    public static function buscarTiposEstadistica()
    {
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFin = $_GET['fechaFin'];

        $condicionFecha = '';
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $fechaIniFormat = date('m-d-Y', strtotime($fechaInicio));
            $fechaFinFormat = date('m-d-Y', strtotime($fechaFin));
            $condicionFecha = " AND DATE(inc_fecha) BETWEEN '$fechaIniFormat' AND '$fechaFinFormat' ";
        }

        $sql = "SELECT UPPER(ci.cat_inc_decrip) AS descripcion, COUNT(*) AS cantidad
            FROM  incidente i        
            INNER JOIN detalle_categ_inc dci ON i.inc_no_incidente = dci.det_categ_id_incidente
            INNER JOIN categoria_incidente ci ON dci.det_categoria = ci.cat_inc_id
            WHERE inc_situacion = 1 $condicionFecha
            GROUP BY ci.cat_inc_decrip";

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

    public static function buscarMotivoIncidentes()
    {
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFin = $_GET['fechaFin'];

        $condicionFecha = '';
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $fechaIniFormat = date('m-d-Y', strtotime($fechaInicio));
            $fechaFinFormat = date('m-d-Y', strtotime($fechaFin));
            $condicionFecha = " AND DATE(inc_fecha) BETWEEN '$fechaIniFormat' AND '$fechaFinFormat' ";
        }

        $sql = "SELECT mot.mot_nombre AS descripcion, COUNT(*) AS cantidad
            FROM incidente i
            INNER JOIN resolicion_incidente ON i.inc_no_incidente = resolicion_incidente.res_inc_incidente_id
            INNER JOIN motivos mot ON resolicion_incidente.res_motivo_id = mot.mot_id
            WHERE i.inc_situacion = 1 $condicionFecha
            GROUP BY mot.mot_nombre";

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
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFin = $_GET['fechaFin'];

        $condicionFecha = '';
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $fechaIniFormat = date('m-d-Y', strtotime($fechaInicio));
            $fechaFinFormat = date('m-d-Y', strtotime($fechaFin));
            $condicionFecha = " AND DATE(inc_fecha) BETWEEN '$fechaIniFormat' AND '$fechaFinFormat' ";
        }

        $sql = "SELECT perp.perp_nombre AS descripcion, COUNT(*) AS cantidad
                FROM incidente i
                INNER JOIN resolicion_incidente res_inc ON i.inc_no_incidente = res_inc.res_inc_incidente_id
                INNER JOIN perpetradores perp ON res_inc.res_perpetrador_id = perp.perp_id
                WHERE perp_situacion = 1 $condicionFecha
                GROUP BY perp.perp_nombre";

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
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFin = $_GET['fechaFin'];

        $condicionFecha = '';
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $fechaIniFormat = date('m-d-Y', strtotime($fechaInicio));
            $fechaFinFormat = date('m-d-Y', strtotime($fechaFin));
            $condicionFecha = " AND DATE(inc_fecha) BETWEEN '$fechaIniFormat' AND '$fechaFinFormat' ";
        }

        $sql = "SELECT d.det_inc_estatus AS descripcion, COUNT(*) AS cantidad
                FROM incidente i
                INNER JOIN detalle_inc d ON i.inc_no_incidente = d.det_inc_id_incidente
                WHERE i.inc_situacion = 1 $condicionFecha 
                GROUP BY d.det_inc_estatus
                ORDER BY d.det_inc_estatus";

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
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFin = $_GET['fechaFin'];

        $condicionFecha = '';
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $fechaIniFormat = date('m-d-Y', strtotime($fechaInicio));
            $fechaFinFormat = date('m-d-Y', strtotime($fechaFin));
            $condicionFecha = " AND DATE(inc_fecha) BETWEEN '$fechaIniFormat' AND '$fechaFinFormat' ";
        }

        $sql = "SELECT d.det_inc_estatus AS descripcion, COUNT(*) AS cantidad
                FROM incidente i
                INNER JOIN detalle_inc d ON i.inc_no_incidente = d.det_inc_id_incidente
                WHERE i.inc_situacion = 1 $condicionFecha 
                GROUP BY d.det_inc_estatus
                ORDER BY d.det_inc_estatus";
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
