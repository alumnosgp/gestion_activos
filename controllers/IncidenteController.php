<?php

namespace Controllers;

use Exception;
use Model\Incidente;
use Model\Personaplanilla;
use Model\Personalta;
use MVC\Router;

class IncidenteController{
    public static function index(Router $router){
            $router->render('incidentes/index');
    }
    public static function guardarApi(){
        try {
            $armas = new Incidente($_POST);
            $resultado = $armas->crear();

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
        $sql = "SELECT * FROM armas where arm_situacion = 1";
        if (isset($_GET['arm_desc']) && $_GET['arm_desc'] != '') {
            $arm_desc = $_GET['arm_desc'];
            $sql .= " and arm_desc like '%$arm_desc%'";
        }
        try {

            $armas = Incidente::fetchArray($sql);

            echo json_encode([
                'mensaje' => $armas,
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

    public static function buscarNombresAPI()
    {
        $catalogo = $_GET['maq_per_alta'] ?? '';

        $sql = "SELECT  per_catalogo, 
        grados.grado_descr AS per_grado,
        plazas.pla_nombre AS per_plaza,
        plazas.pla_id AS plaza_id,
        per_nombre1 ||' '|| per_nombre2 ||' '|| per_apellido1 ||' '|| per_apellido2 AS per_nombre
            FROM persona_dealta
            JOIN grados ON persona_dealta.per_grado = grados.grado_id
            JOIN plazas ON persona_dealta.per_plaza = plazas.pla_id
        where per_catalogo = $catalogo";

        try {
            $catalogo = Personalta::fetchArray($sql);
            header('Content-Type: application/json');
            echo json_encode($catalogo);
            return;
        } catch (Exception $e) {
            echo json_encode([]);
        }
    }
    public static function buscarPlanilleroAPI()
    {
        $catalogoplanilla = $_GET['maq_per_planilla'] ?? '';

        $sql = "SELECT  pcivil_catalogo, 
        grados.grado_descr AS pcivil_gradi,
        plazas.pla_nombre AS pcivil_plaza,
        pcivil_nombre1 ||' '|| pcivil_nombre2 ||' '|| pcivil_apellido1 ||' '|| pcivil_apellido2 AS pcivil_nombre
            FROM persona_planilla
            JOIN grados ON persona_planilla.pcivil_gradi = grados.grado_id
            JOIN plazas ON persona_planilla.pcivil_plaza = plazas.pla_id
        where pcivil_catalogo = $catalogoplanilla";

        try {
            $catalogoplanilla = Personaplanilla::fetchArray($sql);
            header('Content-Type: application/json');
            echo json_encode($catalogoplanilla);
            return;
        } catch (Exception $e) {
            echo json_encode([]);
        }
    }

    
}

?>
