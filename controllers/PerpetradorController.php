<?php

namespace Controllers;

use Exception;
use Model\Perpetrador;
use MVC\Router;

class PerpetradorController{
    public static function index(Router $router){
            $router->render('perpetradores/index');
    }
    public static function guardarApi(){
        try {
            $perpetradores = new Perpetrador($_POST);
            $resultado = $perpetradores->crear();

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
        $sql = "SELECT * FROM perpetradores where perp_situacion = 1 ";
        if (isset($_GET['perp_nombre']) && $_GET['perp_nombre'] != '') {
            $perp_nombre = $_GET['perp_nombre'];
            $sql .= " and perp_nombre like '%$perp_nombre%' ";
        }
        try {

            $perpetradores = Perpetrador::fetchArray($sql);

            echo json_encode([
                'mensaje' => $perpetradores,
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
            $perpetradores = new Perpetrador($_POST);           
           
            $resultado = $perpetradores->actualizar();

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
            $perp_id = $_POST['perp_id'];
            $perpetradores = Perpetrador::find($perp_id);
            $perpetradores->perp_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $perpetradores->actualizar();

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
