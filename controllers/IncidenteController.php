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

            $perpetradores = new Perpetrador($_POST);
            $resultado8 = $perpetradores->crear();

            $motivos = new Motivo($_POST);
            $resultado9 = $motivos->crear();


            // $detalleinc = new Detalleinc($_POST);
            // $resultado3 = $detalleinc->crear();

            $conclusiones = new Conclusion($_POST);
            $resultado10 = $conclusiones->crear();


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
        p1.per_nombre1 || ' ' || p1.per_nombre2 || ' ' || p1.per_apellido1 || ' ' || p1.per_apellido2 AS per_nombre_irt,
        g1.grado_descr AS per_grado_irt,
        pla1.pla_nombre AS per_plaza_irt,
        i.inc_email_irt, 
        i.inc_tel_irt,
        i.inc_catalogo_rep,
        g_rep1.grado_descr AS per_grado_rep,
        pla_rep1.pla_nombre AS per_plaza_rep,
        i.inc_direccion_rep,
        i.inc_tel_rep,
        i.inc_email_rep,
        per_rep1.per_nombre1 || ' ' || per_rep1.per_nombre2 || ' ' || per_rep1.per_apellido1 || ' ' || per_rep1.per_apellido2 AS per_nombre_rep,
        d.det_inc_fec_ocurre,
        d.det_inc_fec_descubre,
        d.det_inc_fec_informa,
        desc_que,
        desc_como,
        desc_porque,
        desc_vista,
        desc_impacto_adv,
        desc_vulnerabilidad,
        det_categ.det_categ_descripcion,
        cat_inc.cat_inc_decrip AS det_categoria, -- Modificado para mostrar el nombre de la categoría como det_categoria
        det_categ.det_categ_observacion
    FROM 
        incidente i
        LEFT JOIN persona_dealta p1 ON i.inc_catalogo_irt = p1.per_catalogo
        LEFT JOIN grados g1 ON p1.per_grado = g1.grado_id
        LEFT JOIN plazas pla1 ON p1.per_plaza = pla1.pla_id
        LEFT JOIN persona_dealta per_rep1 ON i.inc_catalogo_rep = per_rep1.per_catalogo
        LEFT JOIN grados g_rep1 ON per_rep1.per_grado = g_rep1.grado_id
        LEFT JOIN plazas pla_rep1 ON per_rep1.per_plaza = pla_rep1.pla_id
        LEFT JOIN detalle_inc d ON i.inc_id = d.det_inc_id_incidente
        LEFT JOIN descripcion_inc ON i.inc_id = desc_incidente_id
        LEFT JOIN detalle_categ_inc det_categ ON i.inc_id = det_categ.det_categ_id_incidente
        LEFT JOIN categoria_incidente cat_inc ON det_categ.det_categoria = cat_inc.cat_inc_id
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


    public static function modificarDescrip()
    {
        try {
            $incIrt = new Incidente($_POST);           
           
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

    public static function modificarCategoria()
    {
        try {
            $incIrt = new Incidente($_POST);           
           
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
}

?>