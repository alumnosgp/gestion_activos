<?php

namespace Controllers;

use Exception;
use Model\Antiviru;
use MVC\Router;

class AntiviruController{
    public static function index(Router $router){
            $router->render('antivirus/index');
    }
    public static function guardarApi(){
        try {
            $antivirus = new Antiviru($_POST);
            $resultado = $antivirus->crear();

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
        $sql = "SELECT * FROM antivirus where ant_situacion = 1 ";
        if (isset($_GET['ant_nombre']) && $_GET['ant_nombre'] != '') {
            $ant_nombre = $_GET['ant_nombre'];
            $sql .= " and ant_nombre like '%$ant_nombre%' ";
        }
        try {

            $antivirus = Antiviru::fetchArray($sql);

            echo json_encode([
                'mensaje' => $antivirus,
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
            $antivirus = new Antiviru($_POST);           
           
            $resultado = $antivirus->actualizar();

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
            $ant_id = $_POST['ant_id'];
            $antivirus = Antiviru::find($ant_id);
            $antivirus->ant_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $antivirus->actualizar();

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
