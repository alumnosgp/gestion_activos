<?php

namespace Controllers;

use Exception;
use Model\Maquina;
use Model\Antiviru;
use Model\Sistema;
use Model\Office;
use MVC\Router;

class MaquinaController{
    public static function index(Router $router){
        $antiviru = new Antiviru();
        $antivirus = $antiviru->antivirusNombre(); 
        $office = new Office();
        $offices = $office->officeNombre(); 
        $sistema = new Sistema();
        $sistemas = $sistema->sistemaNombre(); 
        $router->render('maquinas/index', ['antivirus' => $antivirus, 'offices' => $offices, 'sistemas' => $sistemas,]);
    }
    public static function guardarApi(){
        try {
            $maquinas = new Maquina($_POST);
            $resultado = $maquinas->crear();

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
        $sql = "SELECT * FROM maquinas where maq_situacion = 1 ";
        if (isset($_GET['maq_nombre']) && $_GET['maq_nombre'] != '') {
            $maq_nombre = $_GET['maq_nombre'];
            $sql .= " and maq_nombre like '%$maq_nombre%' ";
        }
        try {

            $maquinas = Maquina::fetchArray($sql);

            echo json_encode([
                'mensaje' => $maquinas,
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
            $maquinas = new Maquina($_POST);           
           
            $resultado = $maquinas->actualizar();

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
            $maq_id = $_POST['maq_id'];
            $maquinas = Maquina::find($maq_id);
            $maquinas->maq_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $maquinas->actualizar();

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
