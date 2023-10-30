<?php
namespace Model;

class Grado extends ActiveRecord
{
    protected static $tabla = 'grados';
    protected static $columnasDB = ['grado_descr', 'grado_situacion'];
    protected static $idTabla = 'grado_id';

    public $grado_id ;
    public $grado_descr;
    public $grado_situacion;

    public function __construct($args = []){
        $this->grado_id  = $args['grado_id'] ?? null;
        $this->grado_descr = $args['grado_descr'] ?? '';
        $this->grado_situacion = $args['grado_situacion'] ?? '1';
       
    }
    public function gradoNombre(){
        $sql = "SELECT grado_id, grado_descr 
        FROM grados 
        WHERE grado_situacion = 1 
        ORDER BY grado_descr";
        return $this->fetchArray($sql);
    }
}
?>