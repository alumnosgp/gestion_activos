<?php
namespace Controllers;
use Exception;
use Model\Maquina;
use MVC\Router;

class EstadisticaController
{
    public static function index(Router $router)
    {
        $router->render('estadisticas/index', []);
    }
    /* FUNCION PARA MANDAR A LLAMAR LOS DATOS DE EL 1 DIV EN LA VISTA */
    public static function buscarDatosEstadistica()
    {
        $sql = "SELECT sistema_operativo.sist_nombre AS maq_sistema_op,
                COUNT(maquina.maq_id) AS cantidad_maquinas
         FROM maquina 
         FULL JOIN sistema_operativo ON maquina.maq_sistema_op = sistema_operativo.sist_id
         where maq_situacion = 1
         GROUP BY sistema_operativo.sist_nombre";

        try {

            $resultados = Maquina::fetchArray($sql);

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
    public static function buscarDatosSoftware()
    {
        $sql =" SELECT o.off_nombre AS maq_office,
                        COUNT(o.off_id) AS cantidad_offices
                FROM office o
                inner join maquina m ON o.off_id = m.maq_office
                WHERE o.off_situacion = 1
                and m.maq_situacion = 1
                GROUP BY o.off_nombre";

        try {

            $resultados = Maquina::fetchArray($sql);

            echo json_encode($resultados);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
            
        }
    }
/* FUNCION PARA MANDAR A LLAMAR LOS DATOS DE EL 3 DIV EN LA VISTA */
    public static function buscarDatosAntivirus()
    {
        $sql =" SELECT a.ant_nombre AS maq_antivirus,
                        COUNT(a.ant_id) AS cantidad_antivirus
                FROM antivirus a
                inner join maquina m ON a.ant_id = m.maq_antivirus
                WHERE a.ant_situacion = 1
                and m.maq_situacion = 1
                GROUP BY a.ant_nombre";

        try {

            $resultados = Maquina::fetchArray($sql);

            echo json_encode($resultados);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
            
        }
    }
    
    /* FUNCION PARA MANDAR A LLAMAR LOS DATOS DE EL 4 DIV EN LA VISTA */
    public static function buscarDatosMaquinas()
    {
        $sql = "SELECT maq_tipo, COUNT(*) AS cantidad
        FROM maquina
        GROUP BY maq_tipo";

        try {

            $resultados = Maquina::fetchArray($sql);

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

