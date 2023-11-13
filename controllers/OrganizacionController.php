<?php

namespace Controllers;

use Exception;
use Model\Organizacion;
use MVC\Router;

class OrganizacionController{
    public static function index(Router $router){ 
        $router->render('organizaciones/index');
    }
    public static function guardarApi(){
        try {
            $organizaciones = new Organizacion($_POST);
            $resultado = $organizaciones->crear();

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
        $sql = "SELECT * FROM organizaciones where org_situacion = 1 ";
        if (isset($_GET['org_nombre']) && $_GET['org_nombre'] != '') {
            $org_nombre = $_GET['org_nombre'];
            $sql .= " and org_nombre like '%$org_nombre%' ";
        }
        try {

            $organizaciones = Organizacion::fetchArray($sql);

            echo json_encode([
                'mensaje' => $organizaciones,
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
            $organizaciones = new Organizacion($_POST);           
           
            $resultado = $organizaciones->actualizar();

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
            $org_id = $_POST['org_id'];
            $organizaciones = Organizacion::find($org_id);
            $organizaciones->org_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $organizaciones->actualizar();

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
