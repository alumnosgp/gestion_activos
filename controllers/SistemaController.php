<?php

namespace Controllers;

use Exception;
use Model\Sistema;
use MVC\Router;

class SistemaController{
    public static function index(Router $router){
            $router->render('sistemas/index', []);
    }



    public static function guardarApi(){
        try {
            $sitemas = new Sistema($_POST);
            $resultado = $sitemas->crear();

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
        $sist_nombre = $_GET['sist_nombre'];

        $sql = "SELECT * FROM sistema_operativo where sist_situacion = 1 ";
        if ($sist_nombre != '') {
            $sql .= " and sist_nombre like '%$sist_nombre%' ";
        }
        try {

            $sistemas = Sistema::fetchArray($sql);

            echo json_encode($sistemas);
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
            $sitemas = new Sistema($_POST);           
           
            $resultado = $sitemas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Pago modificado correctamente',
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
            $sist_id = $_POST['sist_id'];
            $sitemas = Sistema::find($sist_id);
            $sitemas->sist_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $sitemas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Sistema eliminada correctamente',
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
