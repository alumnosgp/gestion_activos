<?php
namespace Model;

class Resolucioninc extends ActiveRecord
{
    protected static $tabla = 'resolicion_incidente';
    protected static $columnasDB = ['res_inc_incidente_id', 'res_catalogo', 'res_fec_inic_inv', 
    'res_fec_fin_inv', 'res_fec_fin_inc', 'res_fec_fin_imp', 'res_referencia', 'res_perpetrador_id', 
    'res_desc_perpertrador', 'res_motivo_id', 'res_otro', 'res_acc_tomadas', 'res_acc_planificadas', 
    'res_acc_sobresa', 'res_conclu_id', 'res_justificacion','res_inst_interna_id', 'res_otro2', 
    'res_inst_externa_id', 'res_otro3', 'res_situacion'];
    protected static $idTabla = 'res_inc_id';

    public $res_inc_id;
    public $res_inc_incidente_id;
    public $res_catalogo;
    public $res_fec_inic_inv;
    public $res_fec_fin_inv;
    public $res_fec_fin_inc;
    public $res_fec_fin_imp;
    public $res_referencia;
    public $res_perpetrador_id;
    public $res_desc_perpertrador;
    public $res_motivo_id;
    public $res_otro;
    public $res_acc_tomadas;
    public $res_acc_planificadas;
    public $res_acc_sobresa;
    public $res_conclu_id;
    public $res_justificacion;
    public $res_inst_interna_id;
    public $res_otro2;
    public $res_inst_externa_id;
    public $res_otro3;
    public $res_situacion;

    public function __construct($args = []){
        $this->res_inc_id  = $args['res_inc_id'] ?? null;
        $this->res_inc_incidente_id = $args['res_inc_incidente_id'] ?? '';
        $this->res_catalogo = $args['res_catalogo'] ?? '';
        $this->res_fec_inic_inv = $args['res_fec_inic_inv'] ?? '';
        $this->res_fec_fin_inv = $args['res_fec_fin_inv'] ?? '';
        $this->res_fec_fin_inc = $args['res_fec_fin_inc'] ?? '';
        $this->res_fec_fin_imp = $args['res_fec_fin_imp'] ?? '';
        $this->res_referencia = $args['res_referencia'] ?? '';
        $this->res_perpetrador_id = $args['res_perpetrador_id'] ?? '';
        $this->res_desc_perpertrador = $args['res_desc_perpertrador'] ?? '';
        $this->res_motivo_id = $args['res_motivo_id'] ?? '';
        $this->res_otro = $args['res_otro'] ?? '';
        $this->res_acc_tomadas = $args['res_acc_tomadas'] ?? '';
        $this->res_acc_planificadas = $args['res_acc_planificadas'] ?? '';
        $this->res_acc_sobresa = $args['res_acc_sobresa'] ?? '';
        $this->res_conclu_id = $args['res_conclu_id'] ?? '';
        $this->res_justificacion = $args['res_justificacion'] ?? '';
        $this->res_inst_interna_id = $args['res_inst_interna_id'] ?? '';
        $this->res_otro2 = $args['res_otro2'] ?? '';
        $this->res_inst_externa_id = $args['res_inst_externa_id'] ?? '';
        $this->res_otro3 = $args['res_otro3'] ?? '';
        $this->res_situacion = $args['res_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT res_inc_id, res_inc_incidente_id 
    //     FROM armas
    //     WHERE res_situacion = 1 
    //     ORDER BY res_inc_incidente_id";
    //     return $this->fetchArray($sql);
    // }
}
?>