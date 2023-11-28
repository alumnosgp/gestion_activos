<?php
namespace Model;

class Institucionesint extends ActiveRecord
{
    protected static $tabla = 'inst_internas';
    protected static $columnasDB = ['ins_int_nombre', 'ins_int_situacion'];
    protected static $idTabla = 'ins_int_id';

    public $ins_int_id;
    public $ins_int_nombre;
    public $ins_int_situacion;

    public function __construct($args = []){
        $this->ins_int_id  = $args['ins_int_id'] ?? null;
        $this->ins_int_nombre = $args['ins_int_nombre'] ?? '';
        $this->ins_int_situacion = $args['ins_int_situacion'] ?? '1';
       
    }
    public function instInt(){
        $sql = "SELECT ins_int_id, ins_int_nombre 
        FROM inst_internas
        WHERE ins_int_situacion = 1 
        ORDER BY ins_int_nombre";
        return $this->fetchArray($sql);
    }
}
?>