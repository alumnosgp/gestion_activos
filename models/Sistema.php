<?php
namespace Model;

class Sistema extends ActiveRecord
{
    protected static $tabla = 'sistema_operativo';
    protected static $columnasDB = ['sist_nombre', 'sist_situacion'];
    protected static $idTabla = 'sist_id';

    public $sist_id ;
    public $sist_nombre;

    public $sist_situacion;

    public function __construct($args = []){
        $this->sist_id  = $args['sist_id'] ?? null;
        $this->sist_nombre = $args['sist_nombre'] ?? '';
        $this->sist_situacion = $args['sist_situacion'] ?? '1';
    }
    public function sistemaNombre(){
        $sql = "SELECT sist_id, sist_nombre FROM sistema_operativo WHERE sist_situacion = 1";
        return $this->fetchArray($sql);
    }
}

?>