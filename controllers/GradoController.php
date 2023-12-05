<?php

namespace Controllers;

use Exception;
use Model\Grado;
use MVC\Router;

class GradoController{
    public static function index(Router $router){
            $router->render('grados/index');
    }
    public static function guardarApi(){
        try {
            $grados = new Grado($_POST);
            $resultado = $grados->crear();

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
        $sql = "SELECT * FROM grados where grado_situacion = 1 
        ORDER BY grado_descr";
        if (isset($_GET['grado_descr']) && $_GET['grado_descr'] != '') {
            $grado_descr = $_GET['grado_descr'];
            $sql .= " and grado_descr like '%$grado_descr%' ";
        }
        try {

            $grados = Grado::fetchArray($sql);

            echo json_encode([
                'mensaje' => $grados,
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
            $grados = new Grado($_POST);           
           
            $resultado = $grados->actualizar();

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
            $grado_id = $_POST['grado_id'];
            $grados = Grado::find($grado_id);
            $grados->grado_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $grados->actualizar();

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
