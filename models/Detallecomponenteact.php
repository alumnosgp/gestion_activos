<?php
namespace Model;

class Detallecomponenteact extends ActiveRecord
{
    protected static $tabla = 'detalle_comp_activo';
    protected static $columnasDB = ['det_comp_act_inc_id', 'det_comp_act_componente_id', 'det_comp_act_descripcion', 'det_comp_act_situacion'];
    protected static $idTabla = 'det_comp_act_id';

    public $det_comp_act_id;
    public $det_comp_act_inc_id;
    public $det_comp_act_componente_id;
    public $det_comp_act_descripcion;
    public $det_comp_act_situacion;

    public function __construct($args = []){
        $this->det_comp_act_id  = $args['det_comp_act_id'] ?? null;
        $this->det_comp_act_inc_id = $args['det_comp_act_inc_id'] ?? '';
        $this->det_comp_act_componente_id = $args['det_comp_act_componente_id'] ?? '';
        $this->det_comp_act_descripcion = $args['det_comp_act_descripcion'] ?? '';
        $this->det_comp_act_situacion = $args['det_comp_act_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT det_comp_act_id, det_comp_act_inc_id 
    //     FROM armas
    //     WHERE det_comp_act_situacion = 1 
    //     ORDER BY det_comp_act_inc_id";
    //     return $this->fetchArray($sql);
    // }
}
?>