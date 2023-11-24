<?php

namespace Controllers;

use Exception;
use Model\Personalta;
use Model\Grado;
use Model\Arma;
use Model\Plaza;
use MVC\Router;

class PersonaltaController{
    public static function index(Router $router){
        $grado = new Grado();
        $grados = $grado->gradoNombre(); 
        $arma = new Arma();
        $armas= $arma->armaNombre(); 
        $plaza = new Plaza();
        $plazas = $plaza->plazaNombre(); 
        $router->render('personasaltas/index', ['grados' => $grados, 'armas' => $armas, 'plazas' => $plazas,]);
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
        $sql = "SELECT * FROM persona_dealta
        inner join armas on arm_id = per_arma
        inner join grados on grado_id = per_grado
        inner join plazas on pla_id = per_plaza
        WHERE per_situacion = 1";
        
        if (isset($_GET['per_nombre1']) && $_GET['per_nombre1'] != '') {
            $per_nombre1 = $_GET['per_nombre1'];
            $sql .= " and per_nombre1 like '%$per_nombre1%' ";
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
