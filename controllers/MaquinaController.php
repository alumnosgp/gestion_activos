<?php

namespace Controllers;

use Exception;
use Model\Maquina;
use Model\Personalta;
use Model\Personaplanilla;
use Model\Antiviru;
use Model\Office;
use Model\Sistema;
use MVC\Router;

class MaquinaController
{
    public static function index(Router $router)
    {
        $persona = new Personalta();
        $personas = $persona->personaPlaza();
        $planilla = new personaplanilla();
        $planillas = $planilla->planillaPlaza();
        $sistema = new Sistema();
        $sistemas = $sistema->sistemaNombre();
        $antiviru = new Antiviru();
        $antivirus = $antiviru->antivirusNombre();
        $office = new Office();
        $offices = $office->OfficeNombre();
        $router->render('maquinas/index', ['planillas' => $planillas, 'personas' => $personas, 'sistemas' => $sistemas, 'antivirus' => $antivirus, 'offices' => $offices,]);
    }

    public static function guardarApi()
    {
        try {
            // Crear una instancia de Maquina con los datos del formulario
            $maquinas = new Maquina($_POST);
    
            // Validar la dirección MAC
            if (isset($_POST['maq_mac'])) {
                $direccionMAC = $_POST['maq_mac'];
    
                if (filter_var($direccionMAC, FILTER_VALIDATE_MAC)) {
                    // La dirección MAC es válida, procede con la lógica para guardar
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
                } else {
                    // La dirección MAC no es válida
                    echo json_encode([
                        'mensaje' => 'La dirección MAC no es válida',
                        'codigo' => 0
                    ]);
                }
            } else {
                // No se proporcionó ninguna dirección MAC
                echo json_encode([
                    'mensaje' => 'No se proporcionó ninguna dirección MAC',
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
    $maq_nombre = isset($_GET['maq_nombre']) ? $_GET['maq_nombre'] : '';

    // Consulta SQL para buscar máquinas
    $sql = "SELECT  maquina.*,

    plazas.pla_nombre AS maq_plaza,
    sistema_operativo.sist_nombre AS maq_sistema_op,
    office.off_nombre AS maq_office,
    antivirus.ant_nombre AS maq_antivirus,
    alta.per_nombre1 || ' ' || alta.per_nombre2 || ' ' || alta.per_apellido1 || ' ' || alta.per_apellido2 AS maq_per_alta,
    planilla.pcivil_nombre1 || ' ' || planilla.pcivil_nombre2 || ' ' || planilla.pcivil_apellido1 || ' ' || planilla.pcivil_apellido2 AS maq_per_planilla
FROM 
    maquina 
FULL JOIN 
    plazas ON maquina.maq_plaza = plazas.pla_id
FULL JOIN 
    sistema_operativo ON maquina.maq_sistema_op = sistema_operativo.sist_id
FULL JOIN 
    office ON maquina.maq_office = office.off_id
FULL JOIN 
    antivirus ON maquina.maq_antivirus = antivirus.ant_id
FULL JOIN 
    persona_dealta alta ON maquina.maq_per_alta = alta.per_catalogo
FULL JOIN 
    persona_planilla planilla ON maquina.maq_per_planilla = planilla.pcivil_catalogo

    WHERE 
        maquina.maq_situacion >= 1
    ORDER BY maq_id DESC";

    // Agregar condición de búsqueda por nombre si se proporciona
    if (!empty($maq_nombre)) {
        $sql .= " AND maq_nombre LIKE '%$maq_nombre%' ";
    }

    try {
        // Obtener las máquinas de la base de datos
        $maquinas = Maquina::fetchArray($sql);

        // Devolver los resultados en formato JSON
        echo json_encode($maquinas);
    } catch (Exception $e) {
        // Manejar errores y devolver una respuesta JSON
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
                'mensaje' => 'Máquina modificada correctamente',
                'codigo' => 1
            ]);
        } else {
            echo json_encode([
                'mensaje' => 'Ocurrió un error al intentar modificar la máquina',
                'codigo' => 0,
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'detalle' => $e->getMessage(),
            'mensaje' => 'Ocurrió un error durante la modificación de la máquina',
            'codigo' => 0
        ]);
    }
}

public static function eliminarAPI()
{
    try {
        $maq_id = $_POST['maq_id'];
        $maquina = Maquina::find($maq_id);
        $maquina->maq_situacion = '1'; // Cambiar a la situación deseada para eliminar o inhabilitar
        $resultado = $maquina->actualizar();

        if ($resultado['resultado'] == 1) {
            echo json_encode([
                'mensaje' => 'Máquina eliminada correctamente',
                'codigo' => 1
            ]);
        } else {
            echo json_encode([
                'mensaje' => 'Ocurrió un error al intentar eliminar la máquina',
                'codigo' => 0
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'detalle' => $e->getMessage(),
            'mensaje' => 'Ocurrió un error al intentar eliminar la máquina',
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
        pcivil_nombre1 ||' '|| pcivil_nombre2 ||' '|| pcivil_apellido1 ||' '|| pcivil_apellido2 AS pcivil_nombre,
        plazas.pla_id as plaza_id
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