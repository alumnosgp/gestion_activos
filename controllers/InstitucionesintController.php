<?php

namespace Controllers;

use Exception;
use Model\Institucionesint;
use MVC\Router;

class InstitucionesintController{
    public static function index(Router $router){
            $router->render('inst_internas/index');
    }
    public static function guardarApi(){
        try {
            $inst_internas = new Institucionesint($_POST);
            $resultado = $inst_internas->crear();

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
        $sql = "SELECT * FROM inst_internas where ins_int_situacion = 1 
        ORDER BY ins_int_nombre";
        if (isset($_GET['ins_int_nombre']) && $_GET['ins_int_nombre'] != '') {
            $ins_int_nombre = $_GET['ins_int_nombre'];
            $sql .= " and ins_int_nombre like '%$ins_int_nombre%' ";
        }
        try {

            $inst_internas = Institucionesint::fetchArray($sql);

            echo json_encode([
                'mensaje' => $inst_internas,
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
            $inst_internas = new Institucionesint($_POST);           
           
            $resultado = $inst_internas->actualizar();

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
            $ins_int_id = $_POST['ins_int_id'];
            $inst_internas = Institucionesint::find($ins_int_id);
            $inst_internas->ins_int_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $inst_internas->actualizar();

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
