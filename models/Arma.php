<?php
namespace Model;

class Arma extends ActiveRecord
{
    protected static $tabla = 'armas';
    protected static $columnasDB = ['arma_desc', 'arma_situacion'];
    protected static $idTabla = 'arma_id';

    public $arma_id ;
    public $arma_desc;
    public $arma_situacion;

    public function __construct($args = []){
        $this->arma_id  = $args['arma_id'] ?? null;
        $this->arma_desc = $args['arma_desc'] ?? '';
        $this->arma_situacion = $args['arma_situacion'] ?? '1';
       
    }
}
?>