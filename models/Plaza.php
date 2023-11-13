<?php
namespace Model;

class Plaza extends ActiveRecord
{
    protected static $tabla = 'plazas';
    protected static $columnasDB = ['pla_nombre', 'pla_oficina', 'pla_situacion'];
    protected static $idTabla = 'pla_id';

    public $pla_id ;
    public $pla_nombre;
    public $pla_oficina;
    public $pla_situacion;

    public function __construct($args = []){
        $this->pla_id  = $args['pla_id'] ?? null;
        $this->pla_nombre = $args['pla_nombre'] ?? '';
        $this->pla_oficina = $args['pla_oficina'] ?? '';
        $this->pla_situacion = $args['pla_situacion'] ?? '1';
       
    }
    public function plazaNombre(){
        $sql = "SELECT pla_id, pla_nombre 
        FROM plazas 
        WHERE pla_situacion = 1 
        ORDER BY pla_nombre";
        return $this->fetchArray($sql);
    }
}
?>