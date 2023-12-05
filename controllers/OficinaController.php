<?php

namespace Controllers;

use Exception;
use Model\Oficina;
use Model\Organizacion;
use MVC\Router;

class OficinaController{
    public static function index(Router $router){ 
        $organizacion = new Organizacion();
        $organizaciones = $organizacion->organizacionNombre(); 
        $router->render('oficinas/index', ['organizaciones' => $organizaciones,]);
    }
    public static function guardarApi(){
        try {
            $oficinas = new Oficina($_POST);
            $resultado = $oficinas->crear();

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
        $sql = "SELECT * FROM oficinas 
        inner join organizaciones on org_id = ofic_organizacion
        where ofic_situacion = 1 
        ORDER BY ofic_nombre";
        if (isset($_GET['ofic_nombre']) && $_GET['ofic_nombre'] != '') {
            $ofic_nombre = $_GET['ofic_nombre'];
            $sql .= " and ofic_nombre like '%$ofic_nombre%' ";
        }
        try {

            $oficinas = Oficina::fetchArray($sql);

            echo json_encode([
                'mensaje' => $oficinas,
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
            $oficinas = new Oficina($_POST);           
           
            $resultado = $oficinas->actualizar();

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
            $ofic_id = $_POST['ofic_id'];
            $oficinas = Oficina::find($ofic_id);
            $oficinas->ofic_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $oficinas->actualizar();

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
