<?php
namespace Model;

class Tipoefecto extends ActiveRecord
{
    protected static $tabla = 'tipo_efect_adv';
    protected static $columnasDB = ['tip_descrip', 'tip_situacion'];
    protected static $idTabla = 'tip_id';

    public $tip_id;
    public $tip_descrip;
    public $tip_situacion;

    public function __construct($args = []){
        $this->tip_id  = $args['tip_id'] ?? null;
        $this->tip_descrip = $args['tip_descrip'] ?? '';
        $this->tip_situacion = $args['tip_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT tip_id, tip_descrip 
    //     FROM armas
    //     WHERE tip_situacion = 1 
    //     ORDER BY tip_descrip";
    //     return $this->fetchArray($sql);
    // }
}
?>