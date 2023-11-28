<?php
namespace Model;

class Categoriaincidente extends ActiveRecord
{
    protected static $tabla = 'categoria_incidente';
    protected static $columnasDB = ['cat_inc_decrip', 'cat_inc_situacion'];
    protected static $idTabla = 'cat_inc_id';

    public $cat_inc_id;
    public $cat_inc_decrip;
    public $cat_inc_situacion;

    public function __construct($args = []){
        $this->cat_inc_id  = $args['cat_inc_id'] ?? null;
        $this->cat_inc_decrip = $args['cat_inc_decrip'] ?? '';
        $this->cat_inc_situacion = $args['cat_inc_situacion'] ?? '1';
       
    }
    public function categoriaNombre(){
        $sql = "SELECT cat_inc_id, cat_inc_decrip FROM categoria_incidente WHERE cat_inc_situacion = 1";
        return $this->fetchArray($sql);
    }
}
?>