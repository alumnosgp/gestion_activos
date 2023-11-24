<?php
namespace Model;

class Detallefecto extends ActiveRecord
{
    protected static $tabla = 'detalle_efec_abv';
    protected static $columnasDB = ['det_efec_id_incidente', 'det_efct_tipo', 'det_efct_valor', 'det_efct_impacto', 'det_efct_costo', 'det_efct_costo', 'det_efct_situacion'];
    protected static $idTabla = 'det_efct_id';

    public $det_efct_id;
    public $det_efec_id_incidente;
    public $det_efct_tipo;
    public $det_efct_valor;
    public $det_efct_impacto;
    public $det_efct_costo;
    public $det_efct_observacion;
    public $det_efct_situacion;

    public function __construct($args = []){
        $this->det_efct_id  = $args['det_efct_id'] ?? null;
        $this->det_efec_id_incidente = $args['det_efec_id_incidente'] ?? '';
        $this->det_efct_tipo = $args['det_efct_tipo'] ?? '';
        $this->det_efct_valor = $args['det_efct_valor'] ?? '';
        $this->det_efct_impacto = $args['det_efct_impacto'] ?? '';
        $this->det_efct_costo = $args['det_efct_costo'] ?? '';
        $this->det_efct_observacion = $args['det_efct_observacion'] ?? '';
        $this->det_efct_situacion = $args['det_efct_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT det_efct_id, det_efec_id_incidente 
    //     FROM armas
    //     WHERE det_efct_situacion = 1 
    //     ORDER BY det_efec_id_incidente";
    //     return $this->fetchArray($sql);
    // }
}
?>