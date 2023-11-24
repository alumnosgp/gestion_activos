<?php
namespace Model;

class Impactoefecto extends ActiveRecord
{
    protected static $tabla = 'impacto_efect_adv';
    protected static $columnasDB = ['ipm_decrip', 'imp_situacion'];
    protected static $idTabla = 'imp_id';

    public $imp_id;
    public $ipm_decrip;
    public $imp_situacion;

    public function __construct($args = []){
        $this->imp_id  = $args['imp_id'] ?? null;
        $this->ipm_decrip = $args['ipm_decrip'] ?? '';
        $this->imp_situacion = $args['imp_situacion'] ?? '1';
       
    }
    public function impactoNombre(){
        $sql = "SELECT imp_id, ipm_decrip 
        FROM impacto_efect_adv
        WHERE imp_situacion = 1 
        ORDER BY ipm_decrip";
        return $this->fetchArray($sql);
    }
}
?>