<?php
namespace Model;

class Perpetrador extends ActiveRecord
{
    protected static $tabla = 'perpetradores';
    protected static $columnasDB = ['perp_nombre', 'perp_situacion'];
    protected static $idTabla = 'perp_id';

    public $perp_id;
    public $perp_nombre;
    public $perp_situacion;

    public function __construct($args = []){
        $this->perp_id  = $args['perp_id'] ?? null;
        $this->perp_nombre = $args['perp_nombre'] ?? '';
        $this->perp_situacion = $args['perp_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT perp_id, perp_nombre 
    //     FROM armas
    //     WHERE perp_situacion = 1 
    //     ORDER BY perp_nombre";
    //     return $this->fetchArray($sql);
    // }
}
?>