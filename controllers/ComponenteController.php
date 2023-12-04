<?php

namespace Controllers;

use Exception;
use Model\Componenteactivo;
use MVC\Router;

class ComponenteController{
    public static function index(Router $router){
            $router->render('compo_activos/index');
    }
    public static function guardarApi(){
        try {
            $componente = new Componenteactivo($_POST);
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
        $sql = "SELECT * FROM componente_activo WHERE comp_act_situacion = '1' ORDER BY comp_act_nombre";
        if (isset($_GET['comp_act_nombre']) && $_GET['comp_act_nombre'] != '') {
            $comp_act_nombre = $_GET['comp_act_nombre'];
            $sql .= " and comp_act_nombre like '%$comp_act_nombre%' ";
        }
        try {

            $componente = Componenteactivo::fetchArray($sql);

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
            $componente = new Componenteactivo($_POST);           
           
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
            $comp_act_id = $_POST['comp_act_id'];
            $componente = Componenteactivo::find($comp_act_id);
            $componente->comp_act_situacion = '2'; // Cambiar a la situación deseada para eliminar
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
