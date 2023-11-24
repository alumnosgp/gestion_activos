<?php
namespace Model;

class Oficina extends ActiveRecord
{
    protected static $tabla = 'oficinas';
    protected static $columnasDB = ['ofic_nombre', 'ofic_organizacion', 'ofic_situacion'];
    protected static $idTabla = 'ofic_id';

    public $ofic_id ;
    public $ofic_nombre;
    public $ofic_organizacion;
    public $ofic_situacion;

    public function __construct($args = []){
        $this->ofic_id  = $args['ofic_id'] ?? null;
        $this->ofic_nombre = $args['ofic_nombre'] ?? '';
        $this->ofic_organizacion = $args['ofic_organizacion'] ?? '';
        $this->ofic_situacion = $args['ofic_situacion'] ?? '1';
       
    }
    public function oficinaNombre(){
        $sql = "SELECT ofic_id, ofic_nombre FROM oficinas WHERE ofic_situacion = 1";
        return $this->fetchArray($sql);
    }
}

?>
