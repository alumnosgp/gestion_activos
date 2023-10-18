<?php
namespace Model;

class Grado extends ActiveRecord
{
    protected static $tabla = 'grados';
    protected static $columnasDB = ['grado_desc', 'grado_situacion'];
    protected static $idTabla = 'grado_id';

    public $grado_id ;
    public $grado_desc;
    public $grado_situacion;

    public function __construct($args = []){
        $this->grado_id  = $args['grado_id'] ?? null;
        $this->grado_desc = $args['grado_desc'] ?? '';
        $this->grado_situacion = $args['grado_situacion'] ?? '1';
       
    }
}
?>