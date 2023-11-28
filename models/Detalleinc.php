<?php
namespace Model;

class Detalleinc extends ActiveRecord
{
    protected static $tabla = 'detalle_inc';
    protected static $columnasDB = ['det_inc_id_incidente', 'det_inc_fec_ocurre', 'det_inc_fec_descubre', 'det_inc_fec_informa', 'det_inc_estatus', 'det_situacion'];
    protected static $idTabla = 'det_inc_id';

    public $det_inc_id;
    public $det_inc_id_incidente;
    public $det_inc_fec_ocurre;
    public $det_inc_fec_descubre;
    public $det_inc_fec_informa;
    public $det_situacion;

    public function __construct($args = []){
        $this->det_inc_id  = $args['det_inc_id'] ?? null;
        $this->det_inc_id_incidente = $args['det_inc_id_incidente'] ?? '';
        $this->det_inc_fec_ocurre = $args['det_inc_fec_ocurre'] ?? '';
        $this->det_inc_fec_descubre = $args['det_inc_fec_descubre'] ?? '';
        $this->det_inc_fec_informa = $args['det_inc_fec_informa'] ?? '';
        $this->det_inc_estatus = $args['det_inc_estatus'] ?? '';
        $this->det_efct_observacion = $args['det_efct_observacion'] ?? '';
        $this->det_situacion = $args['det_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT det_inc_id, det_inc_id_incidente 
    //     FROM armas
    //     WHERE det_situacion = 1 
    //     ORDER BY det_inc_id_incidente";
    //     return $this->fetchArray($sql);
    // }
}
?>