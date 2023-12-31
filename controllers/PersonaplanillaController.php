<?php

namespace Controllers;

use Exception;
use Model\Personaplanilla;
use Model\Plaza;
use Model\Grado;
use MVC\Router;

class PersonaplanillaController{
    public static function index(Router $router){
        $grado = new Grado();
        $grados = $grado->gradoNombre(); 
        $plaza = new Plaza();
        $plazas = $plaza->plazaNombre(); 
        $router->render('personasplanillas/index', [
            'grados' => $grados,
            'plazas' => $plazas,
        ]);
    }
    public static function guardarApi(){
        try {
            $persona = new Personaplanilla($_POST);
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
        $sql = "SELECT * FROM persona_planilla
        inner join plazas on pla_id = pcivil_plaza
        inner join grados on grado_id = pcivil_gradi
        WHERE pcivil_situacion = 1
        ORDER BY pcivil_nombre1";
        
        if (isset($_GET['pcivil_nombre1']) && $_GET['pcivil_nombre1'] != '') {
            $pcivil_nombre1 = $_GET['pcivil_nombre1'];
            $sql .= " and pcivil_nombre1 like '%$pcivil_nombre1%' ";
        }
        try {

            $persona = Personaplanilla::fetchArray($sql);

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
            $persona = new Personaplanilla($_POST);           
           
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
            $pcivil_id = $_POST['pcivil_id'];
            $persona = Personaplanilla::find($pcivil_id);
            $persona->pcivil_situacion = '2';
            $resultado = $persona->actualizar();

            // ini_set('display_errors', 1);
            // ini_set('display_startup_errors', 1);
            // error_reporting(E_ALL);


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
