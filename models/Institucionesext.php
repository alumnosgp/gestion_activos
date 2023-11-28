<?php
namespace Model;

class Institucionesext extends ActiveRecord
{
    protected static $tabla = 'inst_externas';
    protected static $columnasDB = ['ins_ext_nombre', 'ins_ext_situacion'];
    protected static $idTabla = 'ins_ext_id';

    public $ins_ext_id;
    public $ins_ext_nombre;
    public $ins_ext_situacion;

    public function __construct($args = []){
        $this->ins_ext_id  = $args['ins_ext_id'] ?? null;
        $this->ins_ext_nombre = $args['ins_ext_nombre'] ?? '';
        $this->ins_ext_situacion = $args['ins_ext_situacion'] ?? '1';
       
    }
    public function instExt(){
        $sql = "SELECT ins_ext_id, ins_ext_nombre 
        FROM inst_externas
        WHERE ins_ext_situacion = 1 
        ORDER BY ins_ext_nombre";
        return $this->fetchArray($sql);
    }
}
?>