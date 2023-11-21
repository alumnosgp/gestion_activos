<?php
namespace Model;

class Detallecategoria extends ActiveRecord
{
    protected static $tabla = 'detalle_categ_inc';
    protected static $columnasDB = ['det_categ_id_incidente', 'det_categoria', 'det_categ_descripcion', 'det_categ_observacion', 'det_categ_situacion'];
    protected static $idTabla = 'det_categ_id';

    public $det_categ_id;
    public $det_categ_id_incidente;
    public $det_categoria;
    public $det_categ_descripcion;
    public $det_categ_observacion;
    public $det_categ_situacion;

    public function __construct($args = []){
        $this->det_categ_id  = $args['det_categ_id'] ?? null;
        $this->det_categ_id_incidente = $args['det_categ_id_incidente'] ?? '';
        $this->det_categoria = $args['det_categoria'] ?? '';
        $this->det_categ_descripcion = $args['det_categ_descripcion'] ?? '';
        $this->det_categ_observacion = $args['det_categ_observacion'] ?? '';
        $this->det_categ_situacion = $args['det_categ_situacion'] ?? '1';
       
    }
}
?>