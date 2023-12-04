<?php

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;
use Model\Incidente;
use Exception;

class ReporteincController
{


    public static function IncidentePDF($inc_no_incidente)
    {
        try {

            $modelincidente = new Incidente(["inc_no_incidente" => $inc_no_incidente]);
            $incidente = $modelincidente->getInfo();
            return $incidente;
        } catch (Exception $e) {
        }
    }

    public static function pdfInc(Router $router)
{
    $inc_no_incidente = $_GET['inc_no_incidente'];

    $incidente = static::IncidentePDF($inc_no_incidente);

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
        $inc_no_incidente = $_GET['inc_no_incidente'];

        $incidente = static::IncidentePDF($inc_no_incidente);

        $router->render('reporteinc/pdfInc', [
            'incidente' => $incidente[0],
        ]);
        //print_r($incidente);
    }
}