<?php
namespace Model;

class Impactoefecto extends ActiveRecord
{
    protected static $tabla = 'impacto_efect_adv';
    protected static $columnasDB = ['imp_descrip', 'imp_situacion'];
    protected static $idTabla = 'imp_id';

    public $imp_id;
    public $imp_descrip;
    public $imp_situacion;

    public function __construct($args = []){
        $this->imp_id  = $args['imp_id'] ?? null;
        $this->imp_descrip = $args['imp_descrip'] ?? '';
        $this->imp_situacion = $args['imp_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT imp_id, imp_descrip 
    //     FROM armas
    //     WHERE imp_situacion = 1 
    //     ORDER BY imp_descrip";
    //     return $this->fetchArray($sql);
    // }
}
?>