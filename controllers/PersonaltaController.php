<?php

namespace Controllers;

use Exception;
use Model\Personalta;
use Model\Grado;
use Model\Arma;
use Model\Puesto;
use Model\Oficina;
use MVC\Router;

class PersonaController{
    public static function index(Router $router){
        $oficina = new Oficina();
        $oficinas = $oficina->oficinaNombre(); 
        $grado = new Grado();
        $grados = $grado->gradoNombre(); 
        $arma = new Arma();
        $armas= $arma->armaNombre(); 
        $puesto = new Puesto();
        $puestos = $puesto->puestoNombre(); 
        $router->render('personas/index', ['grados' => $grados, 'armas' => $armas, 'puestos' => $puestos, 'oficinas' => $oficinas,]);
    }
    public static function guardarApi(){
        try {
            $persona = new Personalta($_POST);
            $resultado = $persona->crear();

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
        $sql = "SELECT * FROM personas 
        inner join armas on arm_id = per_arma
        inner join grados on grado_id = per_grado
        inner join oficinas on ofic_id = per_oficina
        inner join puestos on puesto_id = per_puesto
        WHERE per_situacion = 1";
        
        if (isset($_GET['per_nombre']) && $_GET['per_nombre'] != '') {
            $per_nombre = $_GET['per_nombre'];
            $sql .= " and per_nombre like '%$per_nombre%' ";
        }
        try {

            $persona = Personalta::fetchArray($sql);

            echo json_encode([
                'mensaje' => $persona,
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
            $persona = new Personalta($_POST);           
           
            $resultado = $persona->actualizar();

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
            $per_id = $_POST['per_id'];
            $persona = Personalta::find($per_id);
            $persona->per_situacion = '2';
            $resultado = $persona->actualizar();

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
