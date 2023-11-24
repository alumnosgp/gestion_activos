<?php
namespace Model;

class Componenteactivo extends ActiveRecord
{
    protected static $tabla = 'componente_activo';
    protected static $columnasDB = ['comp_act_nombre', 'comp_act_situacion'];
    protected static $idTabla = 'comp_act_id';

    public $comp_act_id;
    public $comp_act_nombre;
    public $comp_act_situacion;

    public function __construct($args = []){
        $this->comp_act_id  = $args['comp_act_id'] ?? null;
        $this->comp_act_nombre = $args['comp_act_nombre'] ?? '';
        $this->comp_act_situacion = $args['comp_act_situacion'] ?? '1';
       
    }
    public function componenteNombre(){
        $sql = "SELECT comp_act_id, comp_act_nombre 
        FROM componente_activo
        WHERE comp_act_situacion = 1";
        return $this->fetchArray($sql);
    }
}
?>