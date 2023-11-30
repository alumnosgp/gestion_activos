<?php

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;
use Model\Maquina;
use Exception;

class ReporteController {


    public static function getMaquina($maq_id)
    {
        $sql = "SELECT  
        maquina.*,
        plazas.pla_nombre AS maq_plaza,
        sistema_operativo.sist_nombre AS maq_sistema_op,
        office.off_nombre AS maq_office,
        antivirus.ant_nombre AS maq_antivirus,
        alta.per_nombre1 || ' ' || alta.per_nombre2 || ' ' || alta.per_apellido1 || ' ' || alta.per_apellido2 AS maq_per_alta,
        planilla.pcivil_nombre1 || ' ' || planilla.pcivil_nombre2 || ' ' || planilla.pcivil_apellido1 || ' ' || planilla.pcivil_apellido2 AS maq_per_planilla,
        CASE
            WHEN alta.per_grado IS NULL THEN g_rep2.grado_descr
            ELSE g_rep1.grado_descr
        END AS per_grado_alta,
        CASE
            WHEN planilla.pcivil_gradi IS NULL THEN g_rep2.grado_descr
            ELSE g_rep1.grado_descr
        END AS per_grado_planilla,
        i.inc_no_incidente
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
    LEFT JOIN persona_dealta p1 ON alta.per_catalogo = p1.per_catalogo
    LEFT JOIN grados g_rep1 ON p1.per_grado = g_rep1.grado_id
    LEFT JOIN grados g_rep2 ON planilla.pcivil_gradi = g_rep2.grado_id
    LEFT JOIN incidente i ON alta.per_catalogo = i.inc_catalogo_irt
    LEFT JOIN grados g1 ON alta.per_grado = g1.grado_id
    LEFT JOIN grados g2 ON planilla.pcivil_gradi = g2.grado_id    
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