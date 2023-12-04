<?php
namespace Model;

class Incidente extends ActiveRecord
{
    protected static $tabla = 'incidente';
    protected static $columnasDB = ['inc_fecha', 'inc_no_incidente', 'inc_no_identificacion', 'inc_catalogo_irt', 'inc_email_irt', 'inc_tel_irt', 'inc_catalogo_rep', 'inc_email_rep', 'inc_tel_rep', 'inc_direccion_rep', 'inc_situacion'];
    protected static $idTabla = 'inc_id';

    public $inc_id;
    public $inc_fecha;
    public $inc_no_incidente;
    public $inc_no_identificacion;
    public $inc_catalogo_irt;
    public $inc_email_irt;
    public $inc_tel_irt;
    public $inc_catalogo_rep;
    public $inc_email_rep;
    public $inc_tel_rep;
    public $inc_direccion_rep;
    public $inc_situacion;

    public function __construct($args = []){
        $this->inc_id  = $args['inc_id'] ?? null;
        $this->inc_fecha = $args['inc_fecha'] ?? '';
        $this->inc_no_incidente = $args['inc_no_incidente'] ?? '';
        $this->inc_no_identificacion = $args['inc_no_identificacion'] ?? '';
        $this->inc_catalogo_irt = $args['inc_catalogo_irt'] ?? '';
        $this->inc_email_irt = $args['inc_email_irt'] ?? '';
        $this->inc_tel_irt = $args['inc_tel_irt'] ?? '';
        $this->inc_catalogo_rep = $args['inc_catalogo_rep'] ?? '';
        $this->inc_email_rep = $args['inc_email_rep'] ?? '';
        $this->inc_tel_rep = $args['inc_tel_rep'] ?? '';
        $this->inc_direccion_rep = $args['inc_direccion_rep'] ?? '';
        $this->inc_situacion = $args['inc_situacion'] ?? '1';
       
    }

    public function getInfo()
    {
        $sql = "SELECT  
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
        LEFT JOIN detalle_inc d ON i.inc_no_incidente = d.det_inc_id_incidente
        LEFT JOIN descripcion_inc ON i.inc_no_incidente = desc_incidente_id
        LEFT JOIN detalle_categ_inc det_categ ON i.inc_no_incidente = det_categ.det_categ_id_incidente
        LEFT JOIN categoria_incidente cat_inc ON det_categ.det_categoria = cat_inc.cat_inc_id
        LEFT JOIN detalle_comp_activo comp_act ON i.inc_no_incidente = comp_act.det_comp_act_inc_id
        LEFT JOIN componente_activo ON comp_act.det_comp_act_componente_id = componente_activo.comp_act_id
        LEFT JOIN detalle_efec_abv det_efect ON i.inc_no_incidente = det_efect.det_efec_id_incidente
        LEFT JOIN resolicion_incidente res_inc ON i.inc_no_incidente = res_inc.res_inc_incidente_id
        LEFT JOIN conclusiones conclu ON res_inc.res_conclu_id = conclu.conclu_id
        LEFT JOIN inst_internas int_int ON res_inc.res_inst_interna_id = int_int.ins_int_id
        LEFT JOIN inst_externas int_ext ON res_inc.res_inst_externa_id = int_ext.ins_ext_id
        LEFT JOIN perpetradores perp ON res_inc.res_perpetrador_id = perp.perp_id
        LEFT JOIN motivos mot ON res_inc.res_motivo_id = mot.mot_id
        LEFT JOIN tipo_efect_adv tipo_efect ON det_efect.det_efct_tipo = tipo_efect.tip_id
        LEFT JOIN valor_efect_adv valor_efect ON det_efect.det_efct_valor = valor_efect.val_id
        LEFT JOIN impacto_efect_adv impacto_efect ON det_efect.det_efct_impacto = impacto_efect.imp_id
      
   WHERE 
            inc_no_incidente = $this->inc_no_incidente";


            
            return self::fetchArray($sql);
    }
}

?>
