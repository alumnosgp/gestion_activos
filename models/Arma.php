<?php
namespace Model;

class Arma extends ActiveRecord
{
    protected static $tabla = 'armas';
    protected static $columnasDB = ['arm_desc', 'arm_situacion'];
    protected static $idTabla = 'arm_id';

    public $arm_id;
    public $arm_desc;
    public $arm_situacion;

    public function __construct($args = []){
        $this->arm_id  = $args['arm_id'] ?? null;
        $this->arm_desc = $args['arm_desc'] ?? '';
        $this->arm_situacion = $args['arm_situacion'] ?? '1';
       
    }
    public function armaNombre(){
        $sql = "SELECT arm_id, arm_desc 
        FROM armas
        WHERE arm_situacion = 1 
        ORDER BY arm_desc";
        return $this->fetchArray($sql);
    }
}
?>