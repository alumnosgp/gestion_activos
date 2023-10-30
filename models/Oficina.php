<?php
namespace Model;

class Oficina extends ActiveRecord
{
    protected static $tabla = 'oficinas';
    protected static $columnasDB = ['ofic_nombre', 'ofic_telefono', 'ofic_direccion', 'ofic_situacion'];
    protected static $idTabla = 'ofic_id';

    public $ofic_id ;
    public $ofic_nombre;
    public $ofic_telefono;
    public $ofic_direccion;
    public $ofic_situacion;

    public function __construct($args = []){
        $this->ofic_id  = $args['ofic_id'] ?? null;
        $this->ofic_nombre = $args['ofic_nombre'] ?? '';
        $this->ofic_telefono = $args['ofic_telefono'] ?? '';
        $this->ofic_direccion = $args['ofic_direccion'] ?? '';
        $this->ofic_situacion = $args['ofic_situacion'] ?? '1';
       
    }
    public function oficinaNombre(){
        $sql = "SELECT ofic_id, ofic_nombre FROM oficinas WHERE ofic_situacion = 1";
        return $this->fetchArray($sql);
    }
}

?>
