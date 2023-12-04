<?php

namespace Controllers;

use Exception;
use Model\Valorefecto;
use MVC\Router;

class PonderacionController{
    public static function index(Router $router){
            $router->render('ponderaciones/index');
    }
    public static function guardarApi(){
        try {
            $componente = new Valorefecto($_POST);
            $resultado = $componente->crear();

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
        $sql = "SELECT * FROM valor_efect_adv WHERE val_situacion = '1' ORDER BY val_decrip";
        if (isset($_GET['val_decrip']) && $_GET['val_decrip'] != '') {
            $val_decrip = $_GET['val_decrip'];
            $sql .= " and val_decrip like '%$val_decrip%' ";
        }
        try {

            $componente = Valorefecto::fetchArray($sql);

            echo json_encode([
                'mensaje' => $componente,
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
            $componente = new Valorefecto($_POST);           
           
            $resultado = $componente->actualizar();

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
            $val_id = $_POST['val_id'];
            $componente = Valorefecto::find($val_id);
            $componente->val_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $componente->actualizar();

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
