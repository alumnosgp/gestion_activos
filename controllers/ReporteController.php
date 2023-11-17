<?php

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;
use Model\Maquina;
use Exception;

class ReporteController {


    public static function getMaquina($maq_id)
    {
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
    maquina.maq_id = ${maq_id} ";

        try{
            $maquina=Maquina::fetchArray($sql);
            return $maquina;
        }
        catch(Exception $e){            
        }
    }

    public static function pdf (Router $router){
        $maq_id = $_GET['maq_id'];

    $maquina = static::getMaquina($maq_id);

        //consulta a la BD 


      
        $mpdf = new Mpdf([
            "orientation" => "P",
            "default_font_size" => 12,
            "default_font" => "arial",
            "format" => "Letter",
            "mode" => 'utf-8'
        ]);
        $mpdf->SetMargins(10,10,10);

        $html = $router->load('reporte/pdf',[
            'maquina' => $maquina[0],
           
        ]);
        // $htmlHeader = $router->load('reporte/header', [
        //     'saludo' => $saludo
        // ]);
        $htmlFooter = $router->load('reporte/footer');
        // $mpdf->SetHTMLHeader($htmlHeader);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}