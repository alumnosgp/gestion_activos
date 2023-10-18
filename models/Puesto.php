<?php
namespace Model;

class Puesto extends ActiveRecord
{
    protected static $tabla = 'puestos';
    protected static $columnasDB = ['puesto_nombre', 'puesto_situacion'];
    protected static $idTabla = 'puesto_id';

    public $puesto_id ;
    public $puesto_nombre;
    public $puesto_situacion;

    public function __construct($args = []){
        $this->puesto_id  = $args['puesto_id'] ?? null;
        $this->puesto_nombre = $args['puesto_nombre'] ?? '';
        $this->puesto_situacion = $args['puesto_situacion'] ?? '1';
       
    }
}
?>