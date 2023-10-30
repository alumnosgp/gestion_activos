<?php

namespace Controllers;

use Exception;
use Model\Arma;
use MVC\Router;

class ArmaController{
    public static function index(Router $router){
            $router->render('armas/index');
    }
    public static function guardarApi(){
        try {
            $armas = new Arma($_POST);
            $resultado = $armas->crear();

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
        $sql = "SELECT * FROM armas where arm_situacion = 1";
        if (isset($_GET['arm_desc']) && $_GET['arm_desc'] != '') {
            $arm_desc = $_GET['arm_desc'];
            $sql .= " and arm_desc like '%$arm_desc%'";
        }
        try {

            $armas = Arma::fetchArray($sql);

            echo json_encode([
                'mensaje' => $armas,
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
            $armas = new Arma($_POST);           
           
            $resultado = $armas->actualizar();

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
            $arm_id = $_POST['arm_id'];
            $armas = Arma::find($arm_id);
            $armas->arm_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $armas->actualizar();

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
