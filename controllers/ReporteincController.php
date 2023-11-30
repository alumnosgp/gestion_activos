<?php

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;
use Model\Incidente;
use Exception;

class ReporteincController
{


    public static function IncidentePDF($inc_id)
    {
        try {

            $modelincidente = new Incidente(["inc_id" => $inc_id]);
            $incidente = $modelincidente->getInfo();
            return $incidente;
        } catch (Exception $e) {
        }
    }

    public static function pdfInc(Router $router)
{
    $inc_id = $_GET['inc_id'];

    $incidente = static::IncidentePDF($inc_id);

    $mpdf = new Mpdf([
        "orientation" => "P",
        "default_font_size" => 12,
        "default_font" => "arial",
        "format" => "Letter",
        "mode" => 'utf-8'
    ]);

    $mpdf->SetMargins(10, 10, 10);

    $htmlHeader = $router->load('reporteinc/header');
    $mpdf->SetHTMLHeader($htmlHeader, 'O');
    

    $htmlFooter = $router->load('reporteinc/footer');
    $mpdf->SetHTMLFooter($htmlFooter);

    $html = $router->load('reporteinc/pdfInc', [
        'incidente' => $incidente[0],
    ]);

    $mpdf->WriteHTML($html);
    $mpdf->Output();
}


    public static function pdfimprime(Router $router)
    {
        $inc_id = $_GET['inc_id'];

        $incidente = static::IncidentePDF($inc_id);

        $router->render('reporteinc/pdfInc', [
            'incidente' => $incidente[0],
        ]);
        //print_r($incidente);
    }
}