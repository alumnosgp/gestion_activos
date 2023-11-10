<?php

namespace Controllers;

use Exception;
use Model\Maquina;
use Model\Oficina;
use Model\Personalta;
use Model\Personaplanilla;
use Model\Antiviru;
use Model\Office;
use Model\Sistema;
use MVC\Router;

class MaquinaController{
    public static function index(Router $router){
        $sistema = new Sistema();
        $sistemas = $sistema->sistemaNombre(); 
        $antiviru = new Antiviru();
        $antivirus = $antiviru->antivirusNombre(); 
        $office = new Office();
        $offices = $office->OfficeNombre(); 
        $router->render('maquinas/index', [ 'sistemas' => $sistemas, 'antivirus' => $antivirus, 'offices' => $offices,]);
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
        $maq_nombre = $_GET['maq_nombre'];

        $sql = "SELECT * FROM maquina where maq_situacion = 1 ";
        if ($maq_nombre != '') {
            $sql .= " and maq_nombre like '%$maq_nombre%' ";
        }
        try {

            $sistemas = Maquina::fetchArray($sql);

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
            $maquinas = new Maquina($_POST);           
           
            $resultado = $maquinas->actualizar();

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
            $maq_id = $_POST['maq_id'];
            $maquinas = Maquina::find($maq_id);
            $maquinas->maq_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $maquinas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Maquina eliminada correctamente',
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

    public static function buscarNombresAPI()
    {
        $catalogo = $_GET['maq_per_alta'] ?? '';

        $sql = "SELECT  per_catalogo, 
        grados.grado_descr AS per_grado,
        plazas.pla_nombre AS per_plaza,
        per_nombre1 ||' '|| per_nombre2 ||' '|| per_apellido1 ||' '|| per_apellido2 AS per_nombre
            FROM persona_dealta
            JOIN grados ON persona_dealta.per_grado = grados.grado_id
            JOIN plazas ON persona_dealta.per_plaza = plazas.pla_id
        where per_catalogo = $catalogo";

        try {
            $catalogo = Personalta::fetchArray($sql);

            // Establece el tipo de contenido de la respuesta a JSON
            header('Content-Type: application/json');

            // Convierte el array a JSON 
            echo json_encode($catalogo);
            return;
        } catch (Exception $e) {
            // En caso de error, envía una respuesta vacía
            echo json_encode([]);
        }
    }
    public static function buscarPlanilleroAPI()
    {
        $catalogoplanilla = $_GET['maq_per_planilla'] ?? '';

        $sql = "SELECT  pcivil_catalogo, pcivil_gradi,
        plazas.pla_nombre AS pcivil_plaza,
        pcivil_nombre1 ||' '|| pcivil_nombre2 ||' '|| pcivil_apellido1 ||' '|| pcivil_apellido2 AS pcivil_nombre
            FROM persona_planilla
            JOIN plazas ON persona_planilla.pcivil_plaza = plazas.pla_id
        where pcivil_catalogo = $catalogoplanilla";

        try {
            $catalogoplanilla = Personaplanilla::fetchArray($sql);

            // Establece el tipo de contenido de la respuesta a JSON
            header('Content-Type: application/json');

            // Convierte el array a JSON 
            echo json_encode($catalogoplanilla);
            return;
        } catch (Exception $e) {
            // En caso de error, envía una respuesta vacía
            echo json_encode([]);
        }
    }
}

?>
