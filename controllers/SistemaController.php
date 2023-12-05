<?php

namespace Controllers;

use Exception;
use Model\Sistema;
use MVC\Router;

class SistemaController{
    public static function index(Router $router){
            $router->render('sistemas/index');
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
        $sql = "SELECT * FROM sistema_operativo where sist_situacion = 1 
        ORDER BY sist_nombre";
        if (isset($_GET['sist_nombre']) && $_GET['sist_nombre'] != '') {
            $sist_nombre = $_GET['sist_nombre'];
            $sql .= " and sist_nombre like '%$sist_nombre%' ";
        }
        try {

            $sistemas = Sistema::fetchArray($sql);

            echo json_encode([
                'mensaje' => $sistemas,
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
            $sitemas = new Sistema($_POST);           
           
            $resultado = $sitemas->actualizar();

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
        $sist_id = $_POST['sist_id'];
        $sistemas = Sistema::find($sist_id);
        $sistemas->sist_situacion = '2'; // Cambiar a la situación deseada para eliminar
        $resultado = $sistemas->actualizar();

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
