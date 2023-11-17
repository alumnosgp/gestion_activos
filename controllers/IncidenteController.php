<?php

namespace Controllers;

use Exception;
use Model\Incidente;
use Model\Personaplanilla;
use Model\Categoriaincidente;
use Model\Componenteactivo;
use Model\Valorefecto;
use Model\Personalta;
use Model\Impactoefecto;
use Model\Tipoefecto;
use MVC\Router;

class IncidenteController{
    public static function index(Router $router)
    {   
        $valor = new Valorefecto();
        $valores = $valor->valorNombre();
        $efecto = new Tipoefecto();
        $efectos = $efecto->efectoNombre();
        $impacto = new Impactoefecto();
        $impactos = $impacto->impactoNombre();
        $componente = new Componenteactivo();
        $componentes = $componente->componenteNombre();
        $categoria = new Categoriaincidente();
        $categorias = $categoria->categoriaNombre();
        $router->render('incidentes/index', ['categorias' => $categorias, 'valores' => $valores, 'componentes' => $componentes, 'impactos' => $impactos, 'efectos' => $efectos]);
    }
    public static function guardarApi(){
        try {
            $incidentes = new Incidente($_POST);
            $resultado = $incidentes->crear();

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


    public static function buscarDatosPorCatalogoIrtAPI()
{
    // Obtener el valor de la variable desde la URL
    $inc_catalogo_irt = $_GET['inc_catalogo_irt'];

    // Construir las consultas SQL para ambas tablas
    $sql_dealta = "SELECT per_catalogo AS inc_catalogo_irt,  
        grados.grado_descr AS per_grado_irt,
        plazas.pla_nombre AS per_plaza_irt,
        plazas.pla_id AS plaza_id_irt,
        per_nombre1 ||' '|| per_nombre2 ||' '|| per_apellido1 ||' '|| per_apellido2 AS per_nombre_irt
        FROM persona_dealta
        JOIN grados ON persona_dealta.per_grado = grados.grado_id
        JOIN plazas ON persona_dealta.per_plaza = plazas.pla_id
        WHERE per_catalogo = $inc_catalogo_irt";

    $sql_planilla = "SELECT pcivil_catalogo AS inc_catalogo_irt, 
        grados.grado_descr AS per_grado_irt,
        plazas.pla_nombre AS per_plaza_irt,
        pcivil_nombre1 ||' '|| pcivil_nombre2 ||' '|| pcivil_apellido1 ||' '|| pcivil_apellido2 AS per_nombre_irt
        FROM persona_planilla
        JOIN grados ON persona_planilla.pcivil_gradi = grados.grado_id
        JOIN plazas ON persona_planilla.pcivil_plaza = plazas.pla_id
        WHERE pcivil_catalogo = $inc_catalogo_irt";

    try {
        // Ejecutar las consultas y obtener los resultados
        $datos_dealta = Personalta::fetchArray($sql_dealta);
        $datos_planilla = Personaplanilla::fetchArray($sql_planilla);


          // Si la primera consulta no devuelve resultados, ejecutar la segunda consulta
          if (empty($datos_dealta)) {
            $datos_planilla = Personaplanilla::fetchArray($sql_planilla);
            $resultados = $datos_planilla;
        } else {
            $resultados = $datos_dealta;
        }

        // Fusionar los resultados en un solo array
        //$resultados = array_merge($datos_dealta, $datos_planilla);

        // Enviar la respuesta en formato JSON
        header('Content-Type: application/json');
        echo json_encode($resultados);
        return;
    } catch (Exception $e) {
        // Manejar errores y devolver una respuesta vacía en caso de error
        echo json_encode(['error' => 'Error en la consulta']);
        return;
    }
}


public static function buscarDatosPorCatalogoRepAPI()
{
    // Verificar si se proporcionó el parámetro en la URL
    if (!isset($_GET['inc_catalogo_rep'])) {
        echo json_encode(['error' => 'Parámetro inc_catalogo_rep no proporcionado']);
        return;
    }

    // Obtener el valor de la variable desde la URL
    $inc_catalogo_rep = $_GET['inc_catalogo_rep'];

    // Construir la consulta SQL para la primera tabla
    $sql_dealta_rep = "SELECT per_catalogo AS inc_catalogo_rep, 
        grados.grado_descr AS per_grado_rep,
        plazas.pla_nombre AS per_plaza_rep,
        plazas.pla_id AS plaza_id_rep,
        per_nombre1 ||' '|| per_nombre2 ||' '|| per_apellido1 ||' '|| per_apellido2 AS per_nombre_rep
        FROM persona_dealta
        JOIN grados ON persona_dealta.per_grado = grados.grado_id
        JOIN plazas ON persona_dealta.per_plaza = plazas.pla_id
        WHERE per_catalogo = $inc_catalogo_rep";

    // Construir la consulta SQL para la segunda tabla
    $sql_planilla_rep = "SELECT pcivil_catalogo AS inc_catalogo_rep, 
        grados.grado_descr AS per_gradi_rep,
        plazas.pla_nombre AS per_laza_rep,
        pcivil_nombre1 ||' '|| pcivil_nombre2 ||' '|| pcivil_apellido1 ||' '|| pcivil_apellido2 AS per_nombre_rep
        FROM persona_planilla
        JOIN grados ON persona_planilla.pcivil_gradi = grados.grado_id
        JOIN plazas ON persona_planilla.pcivil_plaza = plazas.pla_id
        WHERE pcivil_catalogo = $inc_catalogo_rep";

    try {
        // Ejecutar la consulta para la primera tabla y obtener los resultados
        $datos_dealta_rep = Personalta::fetchArray($sql_dealta_rep);

        // Si la primera consulta no devuelve resultados, ejecutar la segunda consulta
        if (empty($datos_dealta_rep)) {
            $datos_planilla_rep = Personaplanilla::fetchArray($sql_planilla_rep);
            $resultados_rep = $datos_planilla_rep;
        } else {
            $resultados_rep = $datos_dealta_rep;
        }

        // Enviar la respuesta en formato JSON
        header('Content-Type: application/json');
        echo json_encode($resultados_rep);
        return;
    } catch (Exception $e) {
        // Manejar errores y devolver una respuesta vacía en caso de error
        echo json_encode(['error' => 'Error en la consulta']);
        return;
    }
}

public static function buscarAPI()
{
    $sql = "SELECT NVL(MAX(inc_id), 0) + 1 AS inc_no_incidente FROM incidente
    ";

    try {

        $incidente = Incidente::fetchArray($sql);

        echo json_encode($incidente);

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
