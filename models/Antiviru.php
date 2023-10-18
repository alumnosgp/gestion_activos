<?php
namespace Model;

class Antiviru extends ActiveRecord
{
    protected static $tabla = 'antivirus';
    protected static $columnasDB = ['ant_nombre', 'ant_situacion'];
    protected static $idTabla = 'ant_id';

    public $ant_id ;
    public $ant_nombre;
    public $ant_situacion;

    public function __construct($args = []){
        $this->ant_id  = $args['ant_id'] ?? null;
        $this->ant_nombre = $args['ant_nombre'] ?? '';
        $this->ant_situacion = $args['ant_situacion'] ?? '1';
       
    }
}

?>