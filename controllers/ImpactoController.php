<?php

namespace Controllers;

use Exception;
use Model\Impactoefecto;
use MVC\Router;

class ImpactoController{
    public static function index(Router $router){
            $router->render('impacto/index');
    }
    public static function guardarApi(){
        try {
            $impactoEfecto = new Impactoefecto($_POST);
            $resultado = $impactoEfecto->crear();

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
        $sql = "SELECT * FROM impacto_efect_adv WHERE imp_situacion = '1' ORDER BY ipm_decrip";
        if (isset($_GET['ipm_decrip']) && $_GET['ipm_decrip'] != '') {
            $ipm_decrip = $_GET['ipm_decrip'];
            $sql .= " and ipm_decrip like '%$ipm_decrip%' ";
        }
        try {

            $impactoEfecto = Impactoefecto::fetchArray($sql);

            echo json_encode([
                'mensaje' => $impactoEfecto,
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
            $impactoEfecto = new Impactoefecto($_POST);           
           
            $resultado = $impactoEfecto->actualizar();

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
            $imp_id = $_POST['imp_id'];
            $impactoEfecto = Impactoefecto::find($imp_id);
            $impactoEfecto->imp_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $impactoEfecto->actualizar();

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
