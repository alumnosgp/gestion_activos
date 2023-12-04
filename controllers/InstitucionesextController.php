<?php

namespace Controllers;

use Exception;
use Model\Institucionesext;
use MVC\Router;

class InstitucionesextController{
    public static function index(Router $router){
            $router->render('inst_externas/index');
    }
    public static function guardarApi(){
        try {
            $instituciones_externas = new Institucionesext($_POST);
            $resultado = $instituciones_externas->crear();

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
        $sql = "SELECT * FROM inst_externas where ins_ext_situacion = 1 ";
        if (isset($_GET['ins_ext_nombre']) && $_GET['ins_ext_nombre'] != '') {
            $ins_ext_nombre = $_GET['ins_ext_nombre'];
            $sql .= " and ins_ext_nombre like '%$ins_ext_nombre%' ";
        }
        try {

            $instituciones_externas = Institucionesext::fetchArray($sql);

            echo json_encode([
                'mensaje' => $instituciones_externas,
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
            $instituciones_externas = new Institucionesext($_POST);           
           
            $resultado = $instituciones_externas->actualizar();

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
            $ins_ext_id = $_POST['ins_ext_id'];
            $instituciones_externas = Institucionesext::find($ins_ext_id);
            $instituciones_externas->ins_ext_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $instituciones_externas->actualizar();

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
