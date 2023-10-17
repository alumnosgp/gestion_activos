<?php
namespace Model;

class Horario extends ActiveRecord
{
    protected static $tabla = 'office';
    protected static $columnasDB = ['off_nombre', 'off_situacion'];
    protected static $idTabla = 'off_id';

    public $off_id ;
    public $off_nombre;
    public $off_situacion;

    public function __construct($args = []){
        $this->off_id  = $args['off_id'] ?? null;
        $this->off_nombre = $args['off_nombre'] ?? '';
        $this->off_situacion = $args['off_situacion'] ?? '1';
       
    }
}

?>