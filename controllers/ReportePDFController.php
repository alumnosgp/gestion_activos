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