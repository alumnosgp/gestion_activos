<?php
namespace Model;

class Categoriaincidente extends ActiveRecord
{
    protected static $tabla = 'categoria_incidente';
    protected static $columnasDB = ['cat_inc_descrip', 'cat_inc_situacion'];
    protected static $idTabla = 'cat_inc_id';

    public $cat_inc_id;
    public $cat_inc_descrip;
    public $cat_inc_situacion;

    public function __construct($args = []){
        $this->cat_inc_id  = $args['cat_inc_id'] ?? null;
        $this->cat_inc_descrip = $args['cat_inc_descrip'] ?? '';
        $this->cat_inc_situacion = $args['cat_inc_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT cat_inc_id, cat_inc_descrip 
    //     FROM armas
    //     WHERE cat_inc_situacion = 1 
    //     ORDER BY cat_inc_descrip";
    //     return $this->fetchArray($sql);
    // }
}
?>