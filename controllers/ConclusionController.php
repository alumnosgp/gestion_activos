<?php

namespace Controllers;

use Exception;
use Model\Conclusion;
use MVC\Router;

class ConclusionController{
    public static function index(Router $router){
            $router->render('conclusiones/index');
    }
    public static function guardarApi(){
        try {
            $conclusiones = new Conclusion($_POST);
            $resultado = $conclusiones->crear();

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
        $sql = "SELECT * FROM conclusiones WHERE conclu_situacion = '1' ORDER BY conclu_nombre";
        if (isset($_GET['conclu_nombre']) && $_GET['conclu_nombre'] != '') {
            $conclu_nombre = $_GET['conclu_nombre'];
            $sql .= " and conclu_nombre like '%$conclu_nombre%' ";
        }
        try {

            $conclusiones = Conclusion::fetchArray($sql);

            echo json_encode([
                'mensaje' => $conclusiones,
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
            $conclusiones = new Conclusion($_POST);           
           
            $resultado = $conclusiones->actualizar();

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
            $conclu_id = $_POST['conclu_id'];
            $conclusiones = Conclusion::find($conclu_id);
            $conclusiones->conclu_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $conclusiones->actualizar();

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
