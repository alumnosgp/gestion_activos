<?php
namespace Model;

class Descripcioninc extends ActiveRecord
{
    protected static $tabla = 'descripcion_inc';
    protected static $columnasDB = ['desc_incidente_id', 'desc_que', 'desc_como', 'desc_porque', 'desc_vista', 'desc_impacto_adv', 'desc_vulnerabilidad', 'desc_situacion'];
    protected static $idTabla = 'desc_id';

    public $desc_id;
    public $desc_incidente_id;
    public $desc_que;
    public $desc_como;
    public $desc_porque;
    public $desc_vista;
    public $desc_impacto_adv;
    public $desc_vulnerabilidad;
    public $desc_situacion;

    public function __construct($args = []){
        $this->desc_id  = $args['desc_id'] ?? null;
        $this->desc_incidente_id = $args['desc_incidente_id'] ?? '';
        $this->desc_que = $args['desc_que'] ?? '';
        $this->desc_como = $args['desc_como'] ?? '';
        $this->desc_porque = $args['desc_porque'] ?? '';
        $this->desc_vista = $args['desc_vista'] ?? '';
        $this->desc_impacto_adv = $args['desc_impacto_adv'] ?? '';
        $this->desc_vulnerabilidad = $args['desc_vulnerabilidad'] ?? '';
        $this->desc_situacion = $args['desc_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT desc_id, desc_incidente_id 
    //     FROM armas
    //     WHERE desc_situacion = 1 
    //     ORDER BY desc_incidente_id";
    //     return $this->fetchArray($sql);
    // }
}
?>