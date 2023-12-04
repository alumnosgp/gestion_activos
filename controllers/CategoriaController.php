<?php

namespace Controllers;

use Exception;
use Model\Categoriaincidente;
use MVC\Router;

class CategoriaController{
    public static function index(Router $router){
            $router->render('categorias/index');
    }
    public static function guardarApi(){
        try {
            $componente = new Categoriaincidente($_POST);
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
        $sql = "SELECT * FROM categoria_incidente WHERE cat_inc_situacion = '1' ORDER BY cat_inc_decrip";
        if (isset($_GET['cat_inc_decrip']) && $_GET['cat_inc_decrip'] != '') {
            $cat_inc_decrip = $_GET['cat_inc_decrip'];
            $sql .= " and cat_inc_decrip like '%$cat_inc_decrip%' ";
        }
        try {

            $componente = Categoriaincidente::fetchArray($sql);

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
            $componente = new Categoriaincidente($_POST);           
           
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
            $cat_inc_id = $_POST['cat_inc_id'];
            $componente = Categoriaincidente::find($cat_inc_id);
            $componente->cat_inc_situacion = '2'; // Cambiar a la situación deseada para eliminar
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
