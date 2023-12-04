<?php

namespace Controllers;

use Exception;
use Model\Tipoefecto;
use MVC\Router;

class TipoEfectoController{
    public static function index(Router $router){
            $router->render('efectosAbv/index');
    }
    public static function guardarApi(){
        try {
            $efectosAbv = new Tipoefecto($_POST);
            $resultado = $efectosAbv->crear();

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
        $sql = "SELECT * FROM tipo_efect_adv WHERE tip_situacion = '1' ORDER BY tip_descrip";
        if (isset($_GET['tip_descrip']) && $_GET['tip_descrip'] != '') {
            $tip_descrip = $_GET['tip_descrip'];
            $sql .= " and tip_descrip like '%$tip_descrip%' ";
        }
        try {

            $efectosAbv = Tipoefecto::fetchArray($sql);

            echo json_encode([
                'mensaje' => $efectosAbv,
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
            $efectosAbv = new Tipoefecto($_POST);           
           
            $resultado = $efectosAbv->actualizar();

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
            $tip_id = $_POST['tip_id'];
            $efectosAbv = Tipoefecto::find($tip_id);
            $efectosAbv->tip_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $efectosAbv->actualizar();

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
