<?php

namespace Controllers;

use Exception;
use Model\Plaza;
use Model\Oficina;
use MVC\Router;

class PlazaController{
    public static function index(Router $router){
            $oficina = new Oficina($_POST);
            $oficinas = $oficina->oficinaNombre();
            $router->render('plazas/index', ['oficinas' => $oficinas,]);
    }

    public static function guardarApi(){
        try {
            $plazas = new Plaza($_POST);
            $resultado = $plazas->crear();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function buscarAPI()
    {
        $sql = "SELECT * FROM plazas
        inner join oficinas on ofic_id = pla_oficina
        where pla_situacion = 1 
        ORDER BY pla_nombre";
        if (isset($_GET['pla_nombre']) && $_GET['pla_nombre'] != '') {
            $pla_nombre = $_GET['pla_nombre'];
            $sql .= " and pla_nombre like '%$pla_nombre%' ";
        }
        try {

            $plazas = Plaza::fetchArray($sql);

            echo json_encode([
                'mensaje' => $plazas,
                'codigo' => 1
            ]);

        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function modificarAPI()
    {
        try {
            $plazas = new Plaza($_POST);           
           
            $resultado = $plazas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Dato modificado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error db',
                    'codigo' => 0,
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error excepcion',
                'codigo' => 0
            ]);
        }
    }

  
public static function eliminarAPI()
{
    try {
        $pla_id = $_POST['pla_id'];
        $plazas = Plaza::find($pla_id);
        $plazas->pla_situacion = '0'; // Cambiar a la situación deseada al eliminar (en este caso, '0')
        $resultado = $plazas->actualizar();

        if ($resultado['resultado'] == 1) {
            echo json_encode([
                'mensaje' => 'Dato eliminado correctamente',
                'codigo' => 1
            ]);
        } else {
            echo json_encode([
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'detalle' => $e->getMessage(),
            'mensaje' => 'Ocurrió un error',
            'codigo' => 0
        ]);
    }
}
 
}

?>
