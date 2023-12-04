<?php

namespace Controllers;

use Exception;
use Model\Motivo;
use MVC\Router;

class MotivoPerpetradorController{
    public static function index(Router $router){
            $router->render('motivos_perpetradores/index');
    }
    public static function guardarApi(){
        try {
            $motivos_perpetradores = new Motivo($_POST);
            $resultado = $motivos_perpetradores->crear();

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
        $sql = "SELECT * FROM motivos where mot_situacion = 1 ";
        if (isset($_GET['mot_nombre']) && $_GET['mot_nombre'] != '') {
            $mot_nombre = $_GET['mot_nombre'];
            $sql .= " and mot_nombre like '%$mot_nombre%' ";
        }
        try {

            $motivos_perpetradores = Motivo::fetchArray($sql);

            echo json_encode([
                'mensaje' => $motivos_perpetradores,
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
            $motivos_perpetradores = new Motivo($_POST);           
           
            $resultado = $motivos_perpetradores->actualizar();

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
            $mot_id = $_POST['mot_id'];
            $motivos_perpetradores = Motivo::find($mot_id);
            $motivos_perpetradores->mot_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $motivos_perpetradores->actualizar();

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
