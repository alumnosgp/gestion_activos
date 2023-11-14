<?php
namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;
use Model\Empleado;

class ReportePDFController
{
    public static function index(Router $router)
    {
        $router->render('reportePDF/index', []);
    }
    public static function getEmpleados($turno)
    {
        $sql = "SELECT * FROM empleados 
            where UPPER(empleado_turno) = UPPER('${turno}')
            and empleado_situacion=1";

        $empleados = Empleado::fetchArray($sql);
        return $empleados;
    }
    public static function pdf(Router $router)
    {
        $empleado_turno = $_GET['empleado_turno'];


        // Obtener los datos de empleados utilizando la funcion buscar
        $empleados = static::getEmpleados($empleado_turno);

        // Crear un objeto mPDF
        $mpdf = new Mpdf([
            "orientation" => "P",
            "default_font_size" => 14,
            "default_font" => "arial",
            "format" => "Letter",
            "mode" => 'utf-8'
        ]);
        $mpdf->SetMargins(30, 35, 55);

        $html = $router->load('empleados/reporte/pdf', [
            'empleados' => $empleados

        ]);



        // Configurar encabezado y pie de página
        $htmlHeader = $router->load('empleados/reporte/header');
        $htmlFooter = $router->load('empleados/reporte/footer');
        $mpdf->SetHTMLHeader($htmlHeader);
        $mpdf->SetHTMLFooter($htmlFooter);

        // Agregar el contenido HTML al PDF
        $mpdf->WriteHTML($html);

        // Generar el PDF y mostrarlo o descargarlo
        $mpdf->Output();
    }
}

/************ ESTE ES NUEVO CODIGO ************ */
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
        $sistema = new Sistema();
        $sistemas = $sistema->sistemaNombre();
        $antiviru = new Antiviru();
        $antivirus = $antiviru->antivirusNombre();
        $office = new Office();
        $offices = $office->OfficeNombre();
        $router->render('maquinas/index', ['personas' => $personas, 'sistemas' => $sistemas, 'antivirus' => $antivirus, 'offices' => $offices,]);
    }



    public static function guardarApi()
    {
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
    $maq_nombre = isset($_GET['maq_nombre']) ? $_GET['maq_nombre'] : '';

    // Consulta SQL para buscar máquinas
    $sql = "SELECT * FROM maquina WHERE maq_situacion = 1 ";

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

        $sql = "SELECT  pcivil_catalogo, pcivil_gradi,
        plazas.pla_nombre AS pcivil_plaza,
        pcivil_nombre1 ||' '|| pcivil_nombre2 ||' '|| pcivil_apellido1 ||' '|| pcivil_apellido2 AS pcivil_nombre
            FROM persona_planilla
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