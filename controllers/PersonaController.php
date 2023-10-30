<?php

namespace Controllers;

use Exception;
use Model\Persona;
use Model\Grado;
use Model\Arma;
use Model\Puesto;
use MVC\Router;

class PersonaController{
    public static function index(Router $router){
        $grado = new Grado();
        $grados = $grado->gradoNombre(); 
        $arma = new Arma();
        $armas= $arma->armaNombre(); 
        $puesto = new Puesto();
        $puestos = $puesto->puestoNombre(); 
        $router->render('personas/index', ['grados' => $grados, 'armas' => $armas, 'puestos' => $puestos,]);
    }
    public static function guardarApi(){
        try {
            $personas = new Persona($_POST);
            $resultado = $personas->crear();

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
        $sql = "SELECT * FROM personas where ant_situacion = 1 ";
        if (isset($_GET['ant_nombre']) && $_GET['ant_nombre'] != '') {
            $ant_nombre = $_GET['ant_nombre'];
            $sql .= " and ant_nombre like '%$ant_nombre%' ";
        }
        try {

            $personas = Persona::fetchArray($sql);

            echo json_encode([
                'mensaje' => $personas,
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
            $personas = new Persona($_POST);           
           
            $resultado = $personas->actualizar();

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
            $ant_id = $_POST['ant_id'];
            $personas = Persona::find($ant_id);
            $personas->ant_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $personas->actualizar();

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
