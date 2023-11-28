<?php
namespace Model;

class Valorefecto extends ActiveRecord
{
    protected static $tabla = 'valor_efect_adv';
    protected static $columnasDB = ['val_decrip', 'val_situacion'];
    protected static $idTabla = 'val_id';

    public $val_id;
    public $val_decrip;
    public $val_situacion;

    public function __construct($args = []){
        $this->val_id  = $args['val_id'] ?? null;
        $this->val_decrip = $args['val_decrip'] ?? '';
        $this->val_situacion = $args['val_situacion'] ?? '1';
       
    }
    public function valorNombre(){
        $sql = "SELECT val_id, val_decrip 
        FROM valor_efect_adv
        WHERE val_situacion = 1 
        ORDER BY val_decrip";
        return $this->fetchArray($sql);
    }
}
?>