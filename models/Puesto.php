<?php
namespace Model;

class Puesto extends ActiveRecord
{
    protected static $tabla = 'puestos';
    protected static $columnasDB = ['pue_nombre', 'pue_situacion'];
    protected static $idTabla = 'puesto_id';

    public $puesto_id ;
    public $pue_nombre;
    public $pue_situacion;

    public function __construct($args = []){
        $this->puesto_id  = $args['puesto_id'] ?? null;
        $this->pue_nombre = $args['pue_nombre'] ?? '';
        $this->pue_situacion = $args['pue_situacion'] ?? '1';
       
    }
    public function puestoNombre(){
        $sql = "SELECT puesto_id, pue_nombre 
        FROM puestos 
        WHERE pue_situacion = 1 
        ORDER BY pue_nombre";
        return $this->fetchArray($sql);
    }
}
?>