<?php
namespace Model;

class Valorefecto extends ActiveRecord
{
    protected static $tabla = 'valor_efect_adv';
    protected static $columnasDB = ['val_descrip', 'val_situacion'];
    protected static $idTabla = 'val_id';

    public $val_id;
    public $val_descrip;
    public $val_situacion;

    public function __construct($args = []){
        $this->val_id  = $args['val_id'] ?? null;
        $this->val_descrip = $args['val_descrip'] ?? '';
        $this->val_situacion = $args['val_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT val_id, val_descrip 
    //     FROM armas
    //     WHERE val_situacion = 1 
    //     ORDER BY val_descrip";
    //     return $this->fetchArray($sql);
    // }
}
?>