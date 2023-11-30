<?php

namespace Controllers;

use Exception;
use Model\Descripcioninc;
use Model\Detallecategoria;
use Model\Detallecomponenteact;
use Model\Detallefecto;
use Model\Detalleinc;
use Model\Incidente;
use Model\Institucionesext;
use Model\Institucionesint;
use Model\Personaplanilla;
use Model\Resolucioninc;
use Model\Categoriaincidente;
use Model\Componenteactivo;
use Model\Valorefecto;
use Model\Personalta;
use Model\Impactoefecto;
use Model\Tipoefecto;
use Model\Perpetrador;
use Model\Motivo;
use Model\Conclusion;
use MVC\Router;

class IncidenteController
{
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
        $perpetrador = new Perpetrador();
        $perpetradores = $perpetrador->perpetradorTipo();
        $conclusion = new Conclusion();
        $concluciones = $conclusion->conclusionNombre();
        $motivo = new Motivo();
        $motivos = $motivo->motivoTipo();
        $externa = new Institucionesext();
        $externas = $externa->instExt();
        $interna = new Institucionesint();
        $internas = $interna->instInt();
        $router->render('incidentes/index', ['externas' => $externas, 'internas' => $internas,  'perpetradores' => $perpetradores, 'concluciones' => $concluciones, 'motivos' => $motivos, 'categorias' => $categorias, 'valores' => $valores, 'componentes' => $componentes, 'impactos' => $impactos, 'efectos' => $efectos]);
    }
    public static function guardarApi()
    {
        try {
            $incidentes = new Incidente($_POST);
            $resultado = $incidentes->crear();

            $descripcion = new Descripcioninc($_POST);
            $resultado2 = $descripcion->crear();

            // Formatear las fechas en el formato YYYY-MM-DD HH:MM
            $fechaOcurreFormateada = date('Y-m-d H:i', strtotime($_POST['det_inc_fec_ocurre']));
            $fechaDescubreFormateada = date('Y-m-d H:i', strtotime($_POST['det_inc_fec_descubre']));
            $fechaInformaFormateada = date('Y-m-d H:i', strtotime($_POST['det_inc_fec_informa']));

            $_POST['det_inc_fec_ocurre'] = $fechaOcurreFormateada;
            $_POST['det_inc_fec_descubre'] = $fechaDescubreFormateada;
            $_POST['det_inc_fec_informa'] = $fechaInformaFormateada;

            $detalleinc = new Detalleinc($_POST);
            $resultado3 = $detalleinc->crear();

            $detallecat = new Detallecategoria($_POST);
            $resultado4 = $detallecat->crear();

            $detcomponente = new Detallecomponenteact($_POST);
            $resultado5 = $detcomponente->crear();

            $detefectos = new Detallefecto($_POST);
            $resultado6 = $detefectos->crear();

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
    public static function guardarModal()
    {
        try {
            //Formatear las fechas en el formato YYYY-MM-DD HH:MM
            $fechainicioInc = date('Y-m-d H:i', strtotime($_POST['res_fec_fin_inc']));
            $fechafinInc = date('Y-m-d H:i', strtotime($_POST['res_fec_fin_imp']));
            $fechafinInv = date('Y-m-d H:i', strtotime($_POST['res_fec_fin_inv']));

            $_POST['res_fec_fin_inc'] = $fechainicioInc;
            $_POST['res_fec_fin_imp'] = $fechafinInc;
            $_POST['res_fec_fin_inv'] = $fechafinInv;

            $resoluciones = new Resolucioninc($_POST);
            $resultado7 = $resoluciones->crear();

            // $perpetradores = new Perpetrador($_POST);
            // $resultado8 = $perpetradores->crear();

            // $motivos = new Motivo($_POST);
            // $resultado9 = $motivos->crear();


            // // $detalleinc = new Detalleinc($_POST);
            // // $resultado3 = $detalleinc->crear();

            // $conclusiones = new Conclusion($_POST);
            // $resultado10 = $conclusiones->crear();


            if ($resultado7['resultado'] == 1) {
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





    public static function buscarApi(){
        $sql_data = "SELECT  
        i.inc_fecha AS inc_fecha, 
        i.inc_no_incidente, 
        i.inc_catalogo_irt,
        CASE
            WHEN (p1.per_nombre1 IS NULL) THEN pp.pcivil_nombre1 || ' ' || pp.pcivil_nombre2 || ' ' || pp.pcivil_apellido1 || ' ' || pp.pcivil_apellido2
            ELSE p1.per_nombre1 || ' ' || p1.per_nombre2 || ' ' || p1.per_apellido1 || ' ' || p1.per_apellido2
        END AS per_nombre_irt,
        CASE
            WHEN p1.per_grado IS NULL THEN g2.grado_descr
            ELSE g1.grado_descr
        END AS per_grado_irt,
        CASE
            WHEN p1.per_plaza is null THEN pla2.pla_nombre
            ELSE pla1.pla_nombre
        END as per_plaza_irt,
        i.inc_email_irt, 
        i.inc_tel_irt,
        i.inc_catalogo_rep,
        CASE
            WHEN (per_rep1.per_nombre1 || ' ' || per_rep1.per_nombre2 || ' ' || per_rep1.per_apellido1 || ' ' || per_rep1.per_apellido2 IS NULL) 
            THEN pp.pcivil_nombre1 || ' ' || pp.pcivil_nombre2 || ' ' || pp.pcivil_apellido1 || ' ' || pp.pcivil_apellido2
            ELSE per_rep1.per_nombre1 || ' ' || per_rep1.per_nombre2 || ' ' || per_rep1.per_apellido1 || ' ' || per_rep1.per_apellido2
        END AS per_nombre_rep,
        CASE
            WHEN p1.per_grado IS NULL THEN g_rep2.grado_descr
            ELSE g_rep1.grado_descr
        END AS per_grado_rep,
        CASE
            WHEN p1.per_plaza is null THEN pla2.pla_nombre
            ELSE pla1.pla_nombre
        END as per_plaza_rep,
        res_inc_id,
        res_fec_inic_inv,
        res_inc_incidente_id,
        res_catalogo,
        CASE
            WHEN (p1.per_nombre1 IS NULL) THEN pp.pcivil_nombre1 || ' ' || pp.pcivil_nombre2 || ' ' || pp.pcivil_apellido1 || ' ' || pp.pcivil_apellido2
            ELSE p1.per_nombre1 || ' ' || p1.per_nombre2 || ' ' || p1.per_apellido1 || ' ' || p1.per_apellido2
        END AS per_nombre_invs,
        CASE
            WHEN p1.per_grado IS NULL THEN g_rep2.grado_descr
            ELSE g_rep1.grado_descr
        END AS per_grado_invs,
        res_fec_fin_inc,
        inc_no_identificacion,
        res_fec_fin_imp,
        res_fec_fin_inv,
        res_referencia,
        perp.perp_nombre AS res_perpetrador_id,
        mot.mot_nombre AS res_motivo_id,
        res_desc_perpertrador,
        res_otro,
        res_acc_tomadas,
        res_acc_planificadas,
        res_acc_sobresa,
        conclu.conclu_nombre AS res_conclu_id,
        res_justificacion,
        int_int.ins_int_nombre AS res_inst_interna_id,
        int_ext.ins_ext_nombre AS res_inst_externa_id,
        res_otro2,
        res_otro3,
        i.inc_direccion_rep,
        i.inc_tel_rep,
        i.inc_email_rep,
        d.det_inc_id,
        det_inc_id_incidente,
        d.det_inc_fec_ocurre,
        d.det_inc_fec_descubre,
        d.det_inc_fec_informa,
        d.det_inc_estatus,
        desc_incidente_id,
        desc_id,
        desc_que,
        desc_como,
        desc_porque,
        desc_vista,
        desc_impacto_adv,
        desc_vulnerabilidad,
        det_categ_id_incidente,
        comp_act_nombre AS det_comp_act_componente_id,
        comp_act.det_comp_act_descripcion,
        tipo_efect.tip_descrip AS det_efct_tipo,
        valor_efect.val_decrip AS det_efct_valor,
        impacto_efect.ipm_decrip AS det_efct_impacto,
        det_efect.det_efct_costo,
        det_efect.det_efct_observacion,
        det_categ.det_categ_id,
        det_categ.det_categ_descripcion,
        cat_inc.cat_inc_decrip AS det_categoria,
        det_categ.det_categ_observacion
    FROM 
        incidente i
        LEFT JOIN persona_dealta p1 ON i.inc_catalogo_irt = p1.per_catalogo
        LEFT JOIN persona_planilla pp ON i.inc_catalogo_irt = pp.pcivil_catalogo
        LEFT JOIN grados g1 ON p1.per_grado = g1.grado_id
        LEFT JOIN grados g2 ON pp.pcivil_gradi = g2.grado_id
        LEFT JOIN plazas pla1 ON p1.per_plaza = pla1.pla_id
        LEFT JOIN plazas pla2 ON pp.pcivil_plaza = pla2.pla_id
        LEFT JOIN persona_dealta per_rep1 ON i.inc_catalogo_rep = per_rep1.per_catalogo
        LEFT JOIN grados g_rep1 ON per_rep1.per_grado = g_rep1.grado_id
        LEFT JOIN grados g_rep2 ON pp.pcivil_gradi = g_rep2.grado_id
        LEFT JOIN plazas pla_rep1 ON per_rep1.per_plaza = pla_rep1.pla_id
        LEFT JOIN detalle_inc d ON i.inc_id = d.det_inc_id_incidente
        LEFT JOIN descripcion_inc ON i.inc_id = desc_incidente_id
        LEFT JOIN detalle_categ_inc det_categ ON i.inc_id = det_categ.det_categ_id_incidente
        LEFT JOIN categoria_incidente cat_inc ON det_categ.det_categoria = cat_inc.cat_inc_id
        LEFT JOIN detalle_comp_activo comp_act ON i.inc_id = comp_act.det_comp_act_inc_id
        LEFT JOIN componente_activo ON comp_act.det_comp_act_componente_id = componente_activo.comp_act_id
        LEFT JOIN detalle_efec_abv det_efect ON i.inc_id = det_efect.det_efec_id_incidente
        LEFT JOIN resolicion_incidente res_inc ON i.inc_id = res_inc.res_inc_incidente_id
        LEFT JOIN conclusiones conclu ON res_inc.res_conclu_id = conclu.conclu_id
        LEFT JOIN inst_internas int_int ON res_inc.res_inst_interna_id = int_int.ins_int_id
        LEFT JOIN inst_externas int_ext ON res_inc.res_inst_externa_id = int_ext.ins_ext_id
        LEFT JOIN perpetradores perp ON res_inc.res_perpetrador_id = perp.perp_id
        LEFT JOIN motivos mot ON res_inc.res_motivo_id = mot.mot_id
        LEFT JOIN tipo_efect_adv tipo_efect ON det_efect.det_efct_tipo = tipo_efect.tip_id
        LEFT JOIN valor_efect_adv valor_efect ON det_efect.det_efct_valor = valor_efect.val_id
        LEFT JOIN impacto_efect_adv impacto_efect ON det_efect.det_efct_impacto = impacto_efect.imp_id
    WHERE 
        i.inc_situacion = 1
    ORDER BY
        i.inc_fecha DESC";
        
       
        try {

            $inc_data = Incidente::fetchArray($sql_data);

            echo json_encode($inc_data);

        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    
//////////////////////////////////////busca el catalogo de IRT
    public static function buscarDatosPorCatalogoIrtAPI()
    {
        // Obtener el valor de la variable desde la URL
        $inc_catalogo_irt = $_GET['inc_catalogo_irt'];

        // Construir las consultas SQL para ambas tablas
        $sql_dealta = "SELECT per_catalogo AS inc_catalogo_rep, 
    per_telefono AS inc_tel_irt,
    per_email AS inc_email_irt,
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
        pcivil_telefono AS inc_tel_irt,
        pcivil_emal AS inc_email_irt,
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
    
    /////////////////////////////////////busca el catalogo de la persona que reporta///////////////////////////
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
    per_telefono AS inc_tel_rep,
    per_direccion AS inc_direccion_rep,
    per_email AS inc_email_rep,
    per_nombre1 ||' '|| per_nombre2 ||' '|| per_apellido1 ||' '|| per_apellido2 AS per_nombre_rep
    FROM persona_dealta
    JOIN grados ON persona_dealta.per_grado = grados.grado_id
    JOIN plazas ON persona_dealta.per_plaza = plazas.pla_id
    WHERE per_catalogo = $inc_catalogo_rep";

        // Construir la consulta SQL para la segunda tabla
        $sql_planilla_rep = "SELECT pcivil_catalogo AS inc_catalogo_rep, 
    grados.grado_descr AS per_grado_rep,
    plazas.pla_nombre AS per_plaza_rep,
    pcivil_telefono AS inc_tel_rep,
    pcivil_direccion AS inc_direccion_rep,
    pcivil_emal AS inc_email_rep,
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
    ///////////////////////////////buscar el ultimo id en la tabla///////////////////////
    public static function buscarAPI1()
    {
        $sql = "SELECT NVL(MAX(inc_id), 0) + 1 AS inc_no_incidente FROM incidente";
        
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
    ///////////////////////////////buscar numero de incidentes///////////////////////////////
    public static function buscarCatalogoInv()
    {
        // Obtener el valor de la variable desde la URL
        $res_catalogo = $_GET['res_catalogo'];
    
        // Construir las consultas SQL para ambas tablas
        $sql_dealta = "SELECT per_catalogo AS res_catalogo, 
    grados.grado_descr AS per_grado_invs,
    per_nombre1 ||' '|| per_nombre2 ||' '|| per_apellido1 ||' '|| per_apellido2 AS per_nombre_invs
    FROM persona_dealta
    JOIN grados ON persona_dealta.per_grado = grados.grado_id
    WHERE per_catalogo = $res_catalogo";
    
        $sql_planilla = "SELECT pcivil_catalogo AS res_catalogo, 
        grados.grado_descr AS per_grado_invs,
        pcivil_nombre1 ||' '|| pcivil_nombre2 ||' '|| pcivil_apellido1 ||' '|| pcivil_apellido2 AS per_nombre_invs
        FROM persona_planilla
        JOIN grados ON persona_planilla.pcivil_gradi = grados.grado_id
        WHERE pcivil_catalogo = $res_catalogo";
    
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

///////////////////////////////modificar descripcion////////////////////////////////////////////
    public static function modificarDescrip()
    {
        try {
            $incIrt = new Descripcioninc($_POST);           
           
            $resultado = $incIrt->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Dato modificado correctamente',
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
//////////////modificar categoria///////////////////////////////////////
    public static function modificarCategoria()
    {
        try {
            $incCatg = new Detallecategoria($_POST);           
           
            $resultado = $incCatg->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Dato modificado correctamente',
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


    ///////////////////////////////////////////fechas/////////////////////
    public static function modificarFecha()
    {
        try {

            // Formatear las fechas en el formato YYYY-MM-DD HH:MM
            $fechaOcurreFormateada = date('Y-m-d H:i', strtotime($_POST['det_inc_fec_ocurre']));
            $fechaDescubreFormateada = date('Y-m-d H:i', strtotime($_POST['det_inc_fec_descubre']));
            $fechaInformaFormateada = date('Y-m-d H:i', strtotime($_POST['det_inc_fec_informa']));

            $_POST['det_inc_fec_ocurre'] = $fechaOcurreFormateada;
            $_POST['det_inc_fec_descubre'] = $fechaDescubreFormateada;
            $_POST['det_inc_fec_informa'] = $fechaInformaFormateada;

            $detInc = new Detalleinc($_POST);           
           
            $resultado = $detInc->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Dato modificado correctamente',
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
}

?>