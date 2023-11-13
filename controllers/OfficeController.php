<?php

namespace Controllers;

use Exception;
use Model\Office;
use MVC\Router;

class OfficeController{
    public static function index(Router $router){
            $router->render('offices/index');
    }
    public static function guardarApi(){
        try {
            $offices = new Office($_POST);
            $resultado = $offices->crear();

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
        $sql = "SELECT * FROM office where off_situacion = 1 ";
        if (isset($_GET['off_nombre']) && $_GET['off_nombre'] != '') {
            $off_nombre = $_GET['off_nombre'];
            $sql .= " and off_nombre like '%$off_nombre%' ";
        }
        try {

            $offices = Office::fetchArray($sql);

            echo json_encode([
                'mensaje' => $offices,
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
            $offices = new Office($_POST);           
           
            $resultado = $offices->actualizar();

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
            $off_id = $_POST['off_id'];
            $offices = Office::find($off_id);
            $offices->off_situacion = '2';
            $resultado = $offices->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Office eliminado correctamente',
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
