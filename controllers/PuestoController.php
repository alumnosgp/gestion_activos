<?php

namespace Controllers;

use Exception;
use Model\Puesto;
use MVC\Router;

class PuestoController{
    public static function index(Router $router){
            $router->render('puestos/index');
    }
    public static function guardarApi(){
        try {
            $puestos = new Puesto($_POST);
            $resultado = $puestos->crear();

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
        $sql = "SELECT * FROM puestos where pue_situacion = 1 ";
        if (isset($_GET['pue_nombre']) && $_GET['pue_nombre'] != '') {
            $pue_nombre = $_GET['pue_nombre'];
            $sql .= " and pue_nombre like '%$pue_nombre%' ";
        }
        try {

            $puestos = Puesto::fetchArray($sql);

            echo json_encode([
                'mensaje' => $puestos,
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
            $puestos = new Puesto($_POST);           
           
            $resultado = $puestos->actualizar();

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
        $puesto_id = $_POST['puesto_id'];
        $puestos = Puesto::find($puesto_id);
        $puestos->pue_situacion = '0'; // Cambiar a la situación deseada al eliminar (en este caso, '0')
        $resultado = $puestos->actualizar();

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
