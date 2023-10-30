<?php

namespace Controllers;

use Exception;
use Model\Antiviru;
use Model\Arma;
use Model\Grado;
use Model\Maquina;
use Model\Office;
use Model\Oficina;
use Model\Persona;
use Model\Puesto;
use Model\Sistema;
use MVC\Router;

class InventarioController{
    public static function index(Router $router){
        $oficina = new Oficina();
        $oficinas = $oficina->oficinaNombre(); 
        $persona = new Persona();
        $personas = $persona->personaDatos(); 
        $maquina = new Maquina();
        $maquinas = $maquina->maquinaSistema(); 
        $router->render('inventarios/index', ['oficinas' => $oficinas,'maquinas' => $maquinas, 'personas' => $personas,]);
    }



    public static function guardarApi(){
        try {
            $sitemas = new Inventario($_POST);
            $resultado = $sitemas->crear();

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
        $sist_nombre = $_GET['sist_nombre'];

        $sql = "SELECT * FROM sistema_operativo where sist_situacion = 1 ";
        if ($sist_nombre != '') {
            $sql .= " and sist_nombre like '%$sist_nombre%' ";
        }
        try {

            $sistemas = Inventario::fetchArray($sql);

            echo json_encode($sistemas);
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
            $sitemas = new Inventario($_POST);           
           
            $resultado = $sitemas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Pago modificado correctamente',
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
            $sist_id = $_POST['sist_id'];
            $sitemas = Inventario::find($sist_id);
            $sitemas->sist_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $sitemas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Inventario eliminada correctamente',
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
